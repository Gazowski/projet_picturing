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
        $this->load->library(['users','ion_auth']);
        $this->load->model('ion_auth_model');
        $this->load->model('ad_model');
        $this->is_admin = $this->ion_auth->is_admin();
        
    }
    
    public function display_all()
    {
        /**
         * lignes suivantes a EFFACER
         * essai sur la methode get_users_groups() de ion_auth_model
         */
        // var_dump($this->ion_auth->logged_in());
        // var_dump($this->ion_auth->get_users_groups()->result());

        /**
         * ligne a conserver
         */
        if ( ! file_exists(APPPATH.'views/pages/tile.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        
        $data['title'] = 'Liste des Annonces'; // Capitalize the first letter
        $data['ad'] = $this->ad_model->get_ad();
        $data['filter'] = [
            'newest_first' => 'plus récent',
            'oldest_first' => 'plus ancien'
        ];

        $this->load->template('pages/tile',$data);
    }
	
	public function display_ad($id_ad)
    {
        if ( ! file_exists(APPPATH.'views/pages/detail_ad.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
		$data['title'] = 'Information Annonce';
        
        $data['ad'] = $this->ad_model->get_ad($id_ad);

        $this->load->template('pages/detail_ad',$data);
    }

    public function create_ad()
    {

        if (!$this->ion_auth->logged_in() /*|| !$this->ion_auth->is_admin()*/)
		{
			redirect('auth/login', 'refresh');
        }
        
        $this->data['page_title'] = 'Ajouter une annonce';

		// validate form input
		$this->form_validation->set_rules('title', 'Titre de l\'annonce', 'trim|required');
		$this->form_validation->set_rules('category', 'Catégorie', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('description','Description', 'trim');
		$this->form_validation->set_rules('price', 'Prix', 'trim|required');
		$this->form_validation->set_rules('photo','Photo','trim');
		$this->form_validation->set_rules('location','Adresse','trim');

		if ($this->form_validation->run() === TRUE)
		{
			$data = [
				'title' => $this->input->post('title'),
				//'types' => $this->input->post('types'),
				'category' => $this->input->post('category'),
				'description' => $this->input->post('description'),
				'price' => intval($this->input->post('price')),
				'photo' => $this->input->post('photo'),
                'location' => $this->input->post('location'),
                'owner' => $this->ion_auth->user()->row()->id,
            ];
            
            var_dump($data);
        }
        // ajout de l'annonce dans la DB
		if ($this->form_validation->run() === TRUE && $this->ad_model->add_ad($data))
		{


            // REDIRECTION : faire la redirection en js.

			// check to see if we are creating the ad
			// redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("display_all", 'refresh');
		}
		else
		{
			// display the create ad form
            // set the flash data error message if there is one
            // MESSAGE ERREUR _____ A ADAPTER !!!!!!!!!!!!!!
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['title'] = [
				'name' => 'title',
				'id' => 'title',
				'type' => 'text',
				'value' => $this->form_validation->set_value('title'),
			];
			$this->data['type'] = [
				'name' => 'type',
                'id' => 'type',
                'option' => $this->ad_model->get_category(),
				'type' => 'select',
				'value' => $this->form_validation->set_value('type'),
			];
			$this->data['category'] = [
				'name' => 'category',
				'id' => 'category',
				'option' => ['-- choisir un type --'],
				'type' => 'select',
				'value' => $this->form_validation->set_value('category'),
			];
			$this->data['description'] = [
				'name' => 'description',
				'id' => 'description',
				'type' => 'text',
				'value' => $this->form_validation->set_value('description'),
			];
			$this->data['price'] = [
				'name' => 'price',
				'id' => 'price',
				'type' => 'text',
				'value' => $this->form_validation->set_value('price'),
			];
			$this->data['photo'] = [
				'name' => 'photo',
				'id' => 'photo',
				'type' => 'text',
				'value' => $this->form_validation->set_value('photo'),
			];
			$this->data['location'] = [
				'name' => 'location',
				'id' => 'location',
				'type' => 'text',
				'value' => $this->form_validation->set_value('location'),
			];

			$this->load->template('pages/create_ad_form',$this->data);
		}
	}

}
