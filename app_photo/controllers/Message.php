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
        $this->load->library(['ion_auth', 'session','form_validation']);
        $this->load->library('mahana_messaging');
        $this->load->model('ion_auth_model');
        $this->load->model('ad_model');
        $this->load->model('member_model');
        $this->load->model('mahana_model');

        $this->CLIENT = 10;
		$this->SUPPLIER = 20;
		$this->GOLDEN_SUPPLIER = 30;
		$this->SUPERVISOR = 40;
		$this->ADMIN = 40;
    }

    /**
     * breadcrumbs() : affiche le fil d'arianne
     * @param string $second (optionnel) : le nom de la 2e page dans le fil d'arianne
     * @param string $third (optionnel) : le nom de la 3e page dans le fil d'arianne
     * @return array : le fil d'arianne a afficher avec les liens vers les pages
     */
    private function breadcrumbs($second = null,$third = null)
    {
        $my_breadcrumbs = [ 'Accueil' => $this->session->userdata['user_role'] >= 40 ? 'index.php/ad/admin_home':'index.php/ad/display_all' ];
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

    public function create_message()
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

        //Initialisation des variables
        $id_ad = $this->session->userdata['id_ad'];
        $id_member = $this->session->userdata['user_id'];

        $this->data['page_title'] = 'Écrivez votre message';
        $this->data['ad'] = $this->ad_model->get_ad($id_ad);
        $this->data['profil'] = $this->member_model->get_member($id_member);
        
        //Validation du message/body
        $this->form_validation->set_rules('message', 'votre message', 'trim|required');

        // Pas sûre d'être à la bonne place?
        if ($this->form_validation->run() === TRUE)
        {
            //A réécrire!!!
            $subject = $this->session->userdata['id_ad'];
            $body = $this->input->post('message');
            $sender_id = $this->session->userdata['user_id'];
            $recipients = $this->session->userdata['ad_owner'];
        }

        if ($this->form_validation->run() === TRUE && $this->mahana_model->send_new_message($sender_id, $recipients, $subject, $body))
        {
            // Ajout message envoi du message
            $this->session->set_flashdata('message', 'Votre message a bien été envoyé');
			redirect("/ad/display_all", 'refresh');
        }
        else
        {
            $this->data['message_error'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message_error')));

            $this->data['body'] = [
                'name' => 'message',
                'id' => 'message',
                'type' => 'text',
                'value' => $this->form_validation->set_value('message'),
            ];
            
            // breadcrumb
			$this->data['breadcrumbs'] = $this->breadcrumbs('liste','votre message');

            $this->load->template('pages/create_message_form', $this->data);
        }
    } 

    /**
     * logique pour afficher la liste des messages par utilisateur
     */

    public function display_messages_user()
    {
        if ( ! file_exists(APPPATH.'views/pages/messages.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        // Si il y a un message concernant l'annonce et que l'utilisateur connecté le message est affiché dans la vue
        if (isset($this->session->userdata['user_id']))
        {      
            $data['page_title'] = 'Liste de vos Messages'; // Capitalize the first letter
            $data['user_id'] = $this->session->userdata['user_id']; 
            $data['threads'] = $this->mahana_model->get_all_threads($data['user_id']);
            $threads = $this->mahana_model->get_all_threads($data['user_id']);
            
            // Ajout d'une alerte "vous n'avez pas de message"
            if (empty($threads)){
                $this->session->set_flashdata('message', 'Vous n\'avez pas de message');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $data['ads'] = [];
                foreach($threads as $thread){
    
                    $id_ad = $thread['subject'];
                    $data['ads'][] = $this->ad_model->get_ad($id_ad);
                }
            }

            // breadcrumb
            $data['breadcrumbs'] = $this->breadcrumbs('messages');

            $this->load->template('pages/messages', $data);
        }
    }

    /**
     * logique pour répondre aux messages
     */
    
    public function reply()
    {
        if ( ! file_exists(APPPATH.'views/pages/messages.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
    
        // Si il y a un message concernant l'annonce et que l'utilisateur connecté est l'owner, le message est affiché dans la vue
        if (isset($this->session->userdata['user_id']))
		{   
            $id_msg = $this->input->post('id_msg');
            $user_id = $this->session->userdata['user_id']; 

            $this->mahana_model->update_message_status($id_msg, $user_id, 1);
            
            $sender_id = $this->session->userdata['user_id'];
            $body = $this->input->post('answer');
            $body = trim($body);

            if ($body == "") {
                $this->session->set_flashdata('message', 'Vous devez remplir le champ message');
                redirect("message/display_messages_user", 'refresh');
            }else{
                $this->mahana_model->reply_to_message($id_msg, $sender_id, $body);
                $this->session->set_flashdata('message', 'Votre message a bien été envoyé');
                redirect('message/display_messages_user','refresh');
            }
        }
    }
}