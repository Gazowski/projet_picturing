<?php

class Member_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        /**
         * methode d'affichage des membres pour les admin
         */ 
        public function get_member($member = false)
        {
            $this->db->select('users.id, email, created_on, last_login, active, first_name, last_name, company, address, name, rating');
            $this->db->from('users');
            $this->db->join('users_groups','users_groups.user_id = users.id');
            $this->db->join('groups','groups.id = users_groups.group_id');
            // faire un left outer join
            $this->db->join('rating','rating.id_rating = rating.rated_user','left outer');
            $this->db->group_by('users.id');



            if ($member === FALSE)
            {
                  
                    $query = $this->db->get();
                    // var_dump($this->db->last_query());
                    // die;
                    return $query->result_array();
            }
    
            $this->db->where('users.id' , $member);
            $query = $this->db->get();
            return $query->row();
        }

        /**
         * methode d'affichage des membres par type
         */
        public function get_by_type($type)
        {
            $this->db->select('users.id, email, created_on, last_login, active, first_name, last_name, company, address, name, AVG(rating) as average');
            $this->db->from('users');
            $this->db->join('users_groups','users_groups.user_id = users.id');
            $this->db->join('groups','groups.id = users_groups.group_id');
            $this->db->join('rating','id_rating = rating.rated_user');
            $this->db->where($type);
            $this->db->group_by('users.id');
            $query = $this->db->get();
            return $query->result_array();
        }

        /**
         * methode d'affichage des membres pour les fournisseurs
         */
        public function get_supplier($supplier = false)
        {
            if ($supplier === FALSE)
            {
                    $this->db->select('first_name, last_name, company, company_number,address,
                                     phone, email, website, social_network');
                    $this->db->from('users');

                    $query = $this->db->get();
                    return $query->result_array();
            }
    
            $query = $this->db->get_where('users', array('id_users' => $supplier));
            return $query->row_array();
        }

        /**
         * récuperer les membres non activés
         */
        public function get_unactive_member()
        {
			$this->db->select('users.id, email, created_on, last_login, active, first_name, last_name, company, name,active,created_on,last_login');
			$this->db->from('users');
			$this->db->join('users_groups','users_groups.user_id = users.id');
			$this->db->join('groups','groups.id = users_groups.group_id');
			$this->db->where('active',0);
		  
			$query = $this->db->get();
			return $query->result_array();
        }
}