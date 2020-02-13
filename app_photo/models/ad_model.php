<?php
class Ad_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_ad($ad = false)
        {
            if ($ad === FALSE)
            {
                    $this->db->select('*');
                    $this->db->from('ad');
                    $this->db->join('category','category.id_category = ad.category');
                    $query = $this->db->get();
                    return $query->result_array();
            }
    
            $query = $this->db->get_where('ad', array('id_ad' => $ad));
            return $query->row_array();
        }
}