<?php

/**
 *  controlleur des membres
 */

 
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
        $this->load->library(['ion_auth']);

    }

    
 //////logique pour afficher la liste des membres pour les admins////   
    public function display_all()
    {
        
        if ( ! file_exists(APPPATH.'views/pages/list.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        
        $data['title'] = 'Liste des Membres'; // Capitalize the first letter
        $data['table'] = $this->member_model->get_member();
       
        $is_admin = $this->ion_auth->is_admin();
        $this->load->template('pages/list',$data,$is_admin);
    }


//////logique pour afficher la liste des membres pour les fournisseurs////
    
public function display_all_supplier()
    {
        
        if ( ! file_exists(APPPATH.'views/pages/list.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        
        $data['title'] = 'Liste des Membres'; // Capitalize the first letter
        $data['table'] = $this->member_model->get_supplier();
       
      
      
        $is_admin = $this->ion_auth->is_admin();
        $this->load->template('pages/list',$data,$is_admin);
    }
}