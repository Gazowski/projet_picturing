<?php

/**
 *  controleur des membres
 */

 
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    private $user_category;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
        $this->load->model('ad_model');
        $this->load->library(['ion_auth']);
    }

    /**
     * load_member_category()
     * REDEFINIR SON UTILITÉ
     */

    private function load_member_category()
    {

        // !!!! ATTENTION -> les catégories doivent être modifié
        $category = [
            'Client' => 'Customer',       
            'Fournisseur' => 'Golden_supplier', // !!!! FAUX
            'admin' => 'Admin'   //  a modifier pour Super_admin
        ];

        $this->user_category = $this->ion_auth->logged_in() ? $category[$this->ion_auth->get_users_groups()->result()] : 'Users';
        //$this->load->library([$this->user_category]);
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
        
        $this->load->template('pages/list',$data,$this->ion_auth->is_admin());
    }

    /**
     * affichage des tous les membres
     */
    public function display_all()
    {
        
        if ( ! file_exists(APPPATH.'views/pages/list.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }       
        
        $data['title'] = 'Liste des Membres'; // Capitalize the first letter
        $data['membres'] = $this->member_model->get_member();
        
        $this->load->template('pages/list_members',$data);
    }

    public function admin_home()
    {
        if ( ! file_exists(APPPATH.'views/pages/admin_home.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        if (!$this->ion_auth->is_admin())
        {
            $this->session->set_flashdata('message', 'Vous n\'êtes pas un administrateur');
            $this->session->set_flashdata('class', 'fail');
            redirect('ad/display_all');
        }
        
        $data['title'] = 'Page Administrateur';
        $data['unactive_member'] = $this->member_model->get_unactive_member();
        $data['unactive_ad'] = $this->ad_model->get_unactive_ad();

        $this->load->template('pages/admin_home',$data,$this->ion_auth->is_admin());

    }
}#