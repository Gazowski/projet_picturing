<?php

/**
 * 
 * je suis sur la branche kervens
 */
class Member_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }
//////////methode d'affichage des membres pour les admin////////
        public function get_member($member = false)
        {
            if ($member === FALSE)
            {
                    $this->db->select('id, email, created_on, last_login, active, first_name, last_name, company, company_number,address,
                    phone, website, social_network');
                    $this->db->from('users');
                    $this->db->join('users_groups','users_groups.user_id = id.users');
                  
                    $query = $this->db->get();
                    return $query->result_array();
            }
    
            $query = $this->db->get_where('users', array('id_users' => $member));
            return $query->row_array();
        }

//////////methode d'affichage des membres pour les fournisseurs////////
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
}