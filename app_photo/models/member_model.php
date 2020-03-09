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
            if ($member === FALSE)
            {
                  
                $query = $this->db->query('
                    SELECT DISTINCT user.id, user.email, user.created_on, user.last_login, user.active, user.first_name, user.last_name, user.company, user.address, gp.name, rate.avg_rate
                    FROM users user
                    LEFT OUTER JOIN (
                        SELECT ROUND(AVG(rating),1) as avg_rate, rated_user
                        FROM rating
                        GROUP BY rated_user
                                    ) rate
                    ON rate.rated_user = user.id
                    JOIN users_groups ugp ON ugp.user_id = user.id
                    JOIN groups gp ON gp.id = ugp.group_id');
                return $query->result_array();
            }
            else{
                $sql = '
                SELECT DISTINCT user.id, user.email, user.created_on, user.last_login, user.active, user.first_name, user.last_name, user.company, user.address, gp.name, rate.avg_rate
                FROM users user
                LEFT OUTER JOIN (
                    SELECT ROUND(AVG(rating),1) as avg_rate, rated_user
                    FROM rating
                    GROUP BY rated_user
                                ) rate
                ON rate.rated_user = user.id
                JOIN users_groups ugp ON ugp.user_id = user.id
                JOIN groups gp ON gp.id = ugp.group_id
                WHERE user.id=?';
                $query = $this->db->query($sql,array($member));
                return $query->row();
            }
    
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