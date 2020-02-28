<?php

/**
 *  controleur des messages
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['users','ion_auth', 'session']);
        $this->load->library('mahana_messaging');
        $this->load->model('ion_auth_model');
        $this->load->model('ad_model');
        $this->load->model('mahana_model');
        $this->is_admin = $this->ion_auth->is_admin();
    }

    public function create_message()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }

        $this->data['page_title'] = 'Écrivez votre message';

        //Validation du formulaire
        $this->form_validation->set_rules('title', 'Titre du message', 'trim|required');
        $this->form_validation->set_rules('message', 'Votre message', 'trim|required');

        if ($this->form_validation->run() === TRUE)
        {
            $data = [
                'title' => $this->input->post('title'),
                'text_message' => $this->input->post('message'),
                'writer' => $this->session->userdata('user_id'),
                'ad' => $this->session->userdata('id_ad'),
                //'ad' => $this->ad->user()->row()->id_ad,
            ];
        }

        if ($this->form_validation->run() === TRUE && $this->mahana_model->send_new_message($data))
        {
            // REDIRECTION : faire la redirection en js.

			// check to see if we are creating the ad
			// redirect them back to the admin page
			$this->session->set_flashdata('message_error', $this->ion_auth->messages());
			redirect("display_ad", 'refresh');
        }
        else{
            $this->data['message_error'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message_error')));

            $this->data['title'] = [
                'name' => 'title',
                'id' => 'title',
                'type' => 'text',
                'value' => $this->form_validation->set_value('title'),
            ];
            $this->data['message'] = [
                'name' => 'message',
                'id' => 'message',
                'type' => 'text',
                'value' => $this->form_validation->set_value('message'),
            ];
            
            $this->load->template('pages/create_message_form', $this->data);
        }
    }  
//////logique pour afficher la liste des messages dans les annonces////
    
    public function display_messages_ad()
    {
        
        if ( ! file_exists(APPPATH.'views/pages/detail_ad.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        //var_dump($id_ad);

        $data['title'] = 'Liste des Messages de votre Annonce'; // Capitalize the first letter
        $data['table'] = $this->message_model->get_message();
        //$data['id_ad'] = localStorage.getItem('id_ad');
        
        //$is_admin = $this->ion_auth->is_admin();
        $this->load->template('pages/detail_ad',$data);
    } 
}