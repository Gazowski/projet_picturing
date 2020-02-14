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

    /**
     *  -   afficher authentification
     *  -   valider authentification
     *  -   creer variable session
     *  -   retour a la page current 
     */

    public function login()
    {
        $data['title'] = 'Login';
        $data['formaction'] = 'member/authentification';
        $data['form'] = [
            'text' => [
                'name' => 'courriel',
                'id' => 'courriel',
                'required' => TRUE
            ],
            'password' => [
                'name' => 'password',
                'id' => 'password',
                'required' => TRUE
            ],
            'button' => [
                'type' => 'submit',
                'value' => 'connection'
            ]
        ];
        $this->load->view('pages/menu', $data);
        $this->load->view('pages/form', $data);
        $this->load->view('pages/footer');
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