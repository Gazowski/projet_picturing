<?php

/**
 * Model des messages
 */

class Message_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
//////////methode d'affichage des membres pour les admin////////
    public function add_message($data) 
    {
        return $this->db->insert('message', $data);
    }

    public function get_message($message = false)
    {
        if ($message === FALSE)
        {
            $this->db->select('*');
            $this->db->from('message');
            $this->db->group_by('date', 'DESC');
            //$this->db->DESC;

            $query = $this->db->get();
            return $query->result_array();
        }

        $query = $this->db->get_where('message', array('ad' => $id_ad));
        return $query->row_array();
    }
}