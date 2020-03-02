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
            $this->db->select('users.id, email, created_on, last_login, active, first_name, last_name, company, address, name');
            $this->db->from('users');
            $this->db->join('users_groups','users_groups.user_id = users.id');
            $this->db->join('groups','groups.id = users_groups.group_id');

            if ($member === FALSE)
            {
                  
                    $query = $this->db->get();
                    return $query->result_array();
            }
    
            $this->db->where('users.id' , $member);
            $query = $this->db->get();
            return $query->row();
        }

        /**
         * methode d'affichage des membres pour les fournisseurs
         */
        public function get_by_type($type)
        {
            $this->db->select('users.id, email, created_on, last_login, active, first_name, last_name, company, address, name');
            $this->db->from('users');
            $this->db->join('users_groups','users_groups.user_id = users.id');
            $this->db->join('groups','groups.id = users_groups.group_id');
            $this->db->where($type);
            $query = $this->db->get();
            return $query->result_array();
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