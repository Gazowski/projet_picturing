<?php

/**
 *  controlleur des requetes ajax
 */

 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_controller extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['users','ion_auth']);
        $this->load->model('ion_auth_model');
        $this->load->model('ad_model');

        $this->ajax_data = '';
        $this->clean_json_data();        
    }

    private function clean_json_data()
    {
        $data = $this->input->raw_input_stream;
        $data = urldecode($data);
        $this->ajax_data = json_decode($data);        
    }

    public function get_category_name()
    {
        if (!$this->ion_auth->logged_in() /*|| !$this->ion_auth->is_admin()*/)
		{
			redirect('auth', 'refresh');
        }
        $result = $this->ad_model->get_category_name($this->ajax_data);
        $select = '';
        foreach($result as $row)
        {
            $select .= "<option value='" . $row['id_category'] . "'>" . $row['name'] . "</option>";
        }
        echo $select;
    }

    public function activate_member()
    {
        if($this->ion_auth->is_admin())
        {
            $id_member = $this->ajax_data;
            $data = [
                'active' => 1,
            ];
            echo $this->ion_auth->update($id_member, $data);
        }
    }

    	
    public function activate_ad()
    {
        if($this->ion_auth->is_admin())
        {
            $id_ad = $this->ajax_data;
            $this->db->set('active',1);
            $this->db->where('id_ad',$id_ad);
            echo $this->db->update('ad');
        }
	}
}