<?php

/**
 *  controlleur des annonces
 */

 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ad extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        //$this->load->model('ad_model');
        $this->load->library(['users','ion_auth']);
        $this->load->model('ion_auth_model');
        
    }
    
    public function display_all()
    {
        /**
         * lignes suivantes a EFFACER
         * essai sur la methode get_users_groups() de ion_auth_model
         */
        var_dump($this->ion_auth->logged_in());
        var_dump($this->ion_auth->get_users_groups()->result());

        /**
         * ligne a conserver
         */
        $this->users->get_all_ads();
    }



    public function create_ad()
    {
        $data['title'] = 'ad';
        $data['formaction'] = 'ad/authentification';
        $data['form'] = [
            'text' => [
                'name' => 'titre',
                'id' => 'titre',
                'required' => TRUE
            ],
            'text' => [
                'name' => 'description',
                'id' => 'description',
                'required' => TRUE
            ],
            'text' => [
                'name' => 'prix',
                'id' => 'prix',
                'required' => TRUE
            ],
            'text' => [
                'name' => 'date_creation',
                'id' => 'prix', 
                'type' => 'date'
            ],
            'text' => [
                'name' => 'date_fermeture',
                'id' => 'date_fermeture',
                'type' => 'date'
            ]
        ];
        $this->load->view('pages/menu', $data);
        $this->load->view('pages/form', $data);
        $this->load->view('pages/footer');
    }
}