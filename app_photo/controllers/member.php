<?php

/**
 *  controlleur des annonces
 */

 
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
        
        $this->load->view('pages/head');
        $this->load->view('pages/header_catalog');
    }
    
    public function display_all()
    {
        
        if ( ! file_exists(APPPATH.'views/pages/list.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        
        $data['title'] = 'Liste des Membres'; // Capitalize the first letter
        $data['member'] = $this->member_model->get_ad();
      
      
        $this->load->view('pages/menu', $data);
        //$this->load->view('pages/filter', $data);
        $this->load->view('pages/list', $data);
        $this->load->view('pages/footer');
    }
}