<?php
class Announcement_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_announcement($announcement = false)
        {
            if ($announcement === FALSE)
            {
                    $query = $this->db->get('announcement');
                    return $query->result_array();
            }
    
            $query = $this->db->get_where('announcement', array('id_announcement' => $announcement));
            return $query->row_array();
        }
}