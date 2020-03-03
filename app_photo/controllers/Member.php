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
        $this->load->helper('date');
    }

//////logique pour afficher la liste des membres pour les fournisseurs////
    
    public function display_all_supplier()
    {
        
        if ( ! file_exists(APPPATH.'views/pages/list.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        if (!isset($this->session->userdata['user_role']) || $this->session->userdata['user_role'] < 40)
        {
            $this->session->set_flashdata('message', 'Vous devez avoir les droits de superviseur');
            redirect($_SERVER['HTTP_REFERER']); 
        }        
        
        $data['title'] = 'Liste des Membres'; // Capitalize the first letter
        $data['table'] = $this->member_model->get_supplier();       
        
        $this->load->template('pages/list',$data);
    }

    /**
     * affichage des tous les membres
     * accessible par superviseur et +
     */
    public function display_all()
    {
        if ( ! file_exists(APPPATH.'views/pages/list.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        if (!isset($this->session->userdata['user_role']) || $this->session->userdata['user_role'] < 40)
        {
            $this->session->set_flashdata('message', 'Vous devez avoir les droits de superviseur');
            redirect($_SERVER['HTTP_REFERER']); 
        }       
        
        $data['title'] = 'Liste des Membres'; // Capitalize the first letter
        $data['membres'] = $this->member_model->get_member();
        
        $this->load->template('pages/list_members',$data);
    }

    /**
     * admin_home() : page d'accueil pour les superviseurs et admins
     */
    public function admin_home()
    {
        if ( ! file_exists(APPPATH.'views/pages/admin_home.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        if (!isset($this->session->userdata['user_role']) || $this->session->userdata['user_role'] < 40)
        {
            $this->session->set_flashdata('message', 'Vous devez avoir les droits de superviseur');
            redirect($_SERVER['HTTP_REFERER']); 
        }
        
        $data['title'] = 'Page Administrateur';
        $data['unactive_member'] = $this->member_model->get_unactive_member();
        $data['unactive_ad'] = $this->ad_model->get_unactive_ad();

        $this->load->template('pages/admin_home',$data);

    }


    public function member($id_member=null)
    {
        if ( ! file_exists(APPPATH.'views/pages/detail_member.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        // redirection si utilisateur non connecté
        if (!isset($this->session->userdata['user_role']))
        {
            $this->session->set_flashdata('message', 'Vous devez être connecté');
            redirect($_SERVER['HTTP_REFERER']); 
        }
        // si $id_member n'est pas renseigné, $id_member prends la valeur de l'user connecté
        $id_member = $id_member == null ? $this->session->userdata['user_id']: $id_member;
        if($this->session->userdata['user_role'] < 10)
        {
            $this->session->set_flashdata('message', 'Vous n\'avez pas les droits');
            redirect($_SERVER['HTTP_REFERER']); 
        }
        
        $data['title'] = 'Profil';
        
        $data['profil'] = $this->member_model->get_member($id_member);
        $data['profil']->last_login = unix_to_human($data['profil']->last_login,true,'eu');
        $data['profil']->created_on = unix_to_human($data['profil']->created_on,true,'eu');

        $this->load->template('pages/detail_member.php',$data);
    }
}