<?php
class Member_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_ad($member = false)
        {
            if ($member === FALSE)
            {
                    $this->db->select('*');
                    $this->db->from('members');
                   // $this->db->join('category','category.id_category = ad.category');
                    $query = $this->db->get();
                    return $query->result_array();
            }
    
            $query = $this->db->get_where('members', array('id_members' => $member));
            return $query->row_array();
        }
}