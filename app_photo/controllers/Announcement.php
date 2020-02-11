<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends CI_Controller {

    public function display_all()
    {
        if ( ! file_exists(APPPATH.'views/pages/announcements.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        

        $data['title'] = 'Liste des Annonces'; // Capitalize the first letter

        $this->load->view('common/header', $data);
        $this->load->view('pages/announcements', $data);
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