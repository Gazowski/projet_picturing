<?php

/**
 *  controlleur des annonces
 */

 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ad extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ad_model');
        
        $this->load->view('pages/head');
        $this->load->view('pages/header_catalog');
    }
    
    public function display_all()
    {
        
        if ( ! file_exists(APPPATH.'views/pages/tile.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        
        $data['title'] = 'Liste des Annonces'; // Capitalize the first letter
        $data['ad'] = $this->ad_model->get_ad();
        $data['filter'] = [
            'newest_first' => 'plus récent',
            'oldest_first' => 'plus ancien'
        ];
        
        
        //$this->load->view('pages/menu', $data);
        $this->load->view('pages/filter', $data);
        $this->load->view('pages/tile', $data);
        $this->load->view('pages/footer');
    }
}