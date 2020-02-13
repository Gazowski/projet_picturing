<?php

/**
 *  controlleur des annonces
 */

 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ad extends CI_Controller {

    public function display_all()
    {
        if ( ! file_exists(APPPATH.'views/pages/ads.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $this->load->model('ad_model');

        $data['title'] = 'Liste des Annonces'; // Capitalize the first letter
        $data['ad'] = $this->ad_model->get_ad();

        $this->load->view('common/header', $data);
        $this->load->view('pages/ads', $data);
        $this->load->view('common/footer', $data);
    }

    public function test()
    {
        if ( ! file_exists(APPPATH.'views/pages/test.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $data['title'] = 'Test'; // Capitalize the first letter
        $data['text'] = 'je suis une page de test';
        $this->load->view('common/header', $data);
        $this->load->view('pages/test', $data);
        $this->load->view('common/footer', $data);
    }
}