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
        $this->load->model('ban_model');
        $this->load->library(['ion_auth']);
        $this->load->helper('date');
    }



    /**
     * breadcrumbs() : affiche le fil d'arianne
     * @param string $second (optionnel) : le nom de la 2e page dans le fil d'arianne
     * @param string $third (optionnel) : le nom de la 3e page dans le fil d'arianne
     * @return array : le fil d'arianne a afficher avec les liens vers les pages
     */
    private function breadcrumbs($second = null,$third = null)
    {
        $my_breadcrumbs = [ 'Accueil' => $this->session->userdata['user_role'] >= 40 ? 'index.php/member/admin_home':'index.php/ad/display_all' ];
        if($second && !$third)
        {
            $my_breadcrumbs[' / '.$second] = $_SERVER['PHP_SELF'];
        }
        else if($second && $third)
        {
            $my_breadcrumbs[' / '.$second] = $_SERVER['HTTP_REFERER'];
            $my_breadcrumbs[' / '.$third] = $_SERVER['PHP_SELF'];
        }

        return $my_breadcrumbs;
    }

    /**
     * affichage des tous les fournisseurs
     * accessible par superviseur et +
     */
    
    public function display_all_supervisor()
    {
        
        if ( ! file_exists(APPPATH.'views/pages/list.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        if (!isset($this->session->userdata['user_role']) || $this->session->userdata['user_role'] < 50)
        {
            $this->session->set_flashdata('message', 'Vous devez avoir les droits d\'administrateur');
            redirect($_SERVER['HTTP_REFERER']); 
        }        
        
        $data['title'] = 'Liste des superviseurs'; // Capitalize the first letter
        $data['membres'] = $this->member_model->get_by_type('name = "Superviseur"');
        
        // breadcrumb
        $data['breadcrumbs'] = $this->breadcrumbs('liste');
        
        $this->load->template('pages/list_members',$data);
    }


    /**
     * affichage des tous les fournisseurs
     * accessible par superviseur et +
     */
    
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
        
        $data['title'] = 'Liste des Fournisseurs'; // Capitalize the first letter
        $data['membres'] = $this->member_model->get_by_type('name = "Fournisseur" OR name = "Fournisseur Or"');

        // breadcrumb
        $data['breadcrumbs'] = $this->breadcrumbs('liste');
        
        $this->load->template('pages/list_members',$data);
    }

    /**
     * affichage des tous les clients
     * accessible par fournisseur or et +
     */
    
    public function display_all_client()
    {
        
        if ( ! file_exists(APPPATH.'views/pages/list.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        if (!isset($this->session->userdata['user_role']) || $this->session->userdata['user_role'] < 30)
        {
            $this->session->set_flashdata('message', 'Vous devez avoir les droits de superviseur');
            redirect($_SERVER['HTTP_REFERER']); 
        }        
        
        $data['title'] = 'Liste des Clients'; 
        $data['membres'] = $this->member_model->get_by_type('name = "Client"');    
        
        // breadcrumb
        $data['breadcrumbs'] = $this->breadcrumbs('liste');
        
        $this->load->template('pages/list_members',$data);
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

        // breadcrumb
        $data['breadcrumbs'] = $this->breadcrumbs('liste');
        
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

        // breadcrumb
        $data['breadcrumbs'] = $this->breadcrumbs();

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
        $data['profil']->social_network = explode(',',$data['profil']->social_network);
        $data['profil']->is_banish = $this->ban_model->is_banish($id_member) ? true : false;


        /**
         * affichage des boutons
         * - les boutons sont créer dans des vues 'btn'
         * - les vues sont appelés dans des fonctions anonymes
         * - en fonction des droits de l'utilisateur , les fonctions anomymes sont stockées dans des variables (ce qui perment de ne pas éxucuter la fonction dès qu'on l'appelle)
         * - la vue bouton btn est ensuite appelée directement dans la vue principale via la variable-fonction
         */        

        // affichage des bouton modifier / supprimer
        $member_btn_view = function(){
            $this->load->view('pages/btn_member/member_btn');
        };
        $data['member_btn'] = $this->session->userdata['user_id'] == $id_member ? $member_btn_view : null;
        
        //affichage du bouton superviseur
        $this->member_active = $data['profil']->active;
        $supervisor_btn_view = function(){
            $data['is_enabled'] = $this->member_active;
            $this->load->view('pages/btn_member/supervisor_btn',$data);
        };
        // le bouton est affiché si l'utilisateur est superviseur ou + et si il ne visualise pas son profil
        $is_supervisor = $this->session->userdata['user_role'] >= 40 && $this->session->userdata['user_id'] != $id_member;
        $data['supervisor_btn'] = $is_supervisor ? $supervisor_btn_view : null;
        
        // affichage bouton administrateur
        $admin_btn_view = function(){
            $this->load->view('pages/btn_member/admin_btn');
        }; 
        // bouton affiché si l'utilisateur est admin , si il ne visite pas son profil et si le  si le membre visité n'est pas superviseur
        $is_admin = $this->session->userdata['user_role'] >= 50 && $this->session->userdata['user_id'] != $id_member && $data['profil']->name != 'Superviseur';
        $data['admin_btn'] = $is_admin ? $admin_btn_view : null;

        // breadcrumb
        $data['breadcrumbs'] = $this->breadcrumbs('liste','profil');

        $this->load->template('pages/detail_member.php',$data);
    }
}