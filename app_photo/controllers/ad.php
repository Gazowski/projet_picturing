<?php

/**
 *  controlleur des annonces
 */

 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ad extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('ad_model');
        $this->load->library(['users']);
        
    }
    
    public function display_all()
    {
        $this->users->get_all_ads();
        
        // if ( ! file_exists(APPPATH.'views/pages/tile.php'))
        // {
        //     // Whoops, we don't have a page for that!
        //     show_404();
        // }
        
        
        // $data['title'] = 'Liste des Annonces'; // Capitalize the first letter
        // $data['ad'] = $this->ad_model->get_ad();
        // $data['filter'] = [
        //     'newest_first' => 'plus récent',
        //     'oldest_first' => 'plus ancien'
        // ];


        // $is_admin = $this->ion_auth->is_admin();
        // $this->load->template('pages/tile',$data,$is_admin);
    }
}