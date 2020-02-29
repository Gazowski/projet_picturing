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
        $this->load->library(['users','ion_auth', 'session']);
        $this->load->model('ion_auth_model');
        $this->load->model('ad_model');
		$this->is_admin = $this->ion_auth->is_admin();
		
		$this->CLIENT = 10;
		$this->SUPPLIER = 20;
		$this->GOLDEN_SUPPLIER = 30;
		$this->SUPERVISOR = 40;
		$this->ADMIN = 40;
    }
    
    public function display_all()
    {

        if ( ! file_exists(APPPATH.'views/pages/tile.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        
        $data['title'] = 'Liste des Annonces'; // Capitalize the first letter
        $data['ad'] = $this->ad_model->get_ads();

        $this->load->template('pages/tile',$data);
    }


	public function display_all_product()
    {

        /**
         * ligne a conserver
         */
        if ( ! file_exists(APPPATH.'views/pages/tile.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        
        $data['title'] = 'Liste des Produits'; // Capitalize the first letter
        $data['ad'] = $this->ad_model->get_ad_product();

        $this->load->template('pages/tile',$data);
	}
	

	public function display_all_service()
    {
        /**
         * ligne a conserver
         */
        if ( ! file_exists(APPPATH.'views/pages/tile.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        
        $data['title'] = 'Liste des Produits';
        $data['ad'] = $this->ad_model->get_ad_servive();

        $this->load->template('pages/tile',$data);
	}
	
	public function member_ads()
	{
		// page accessible pour les membres connectés
		if (!isset($this->session->userdata['user_role']))
		{   
            $this->session->set_flashdata('message', 'Vous devez être connecté');
			redirect($_SERVER['HTTP_REFERER']); // redirection vers la précédente page
        }

		// si client connectés sélectionnés les annonces soumissionnées par le client
		if ($this->session->userdata['user_role'] == $this->CLIENT)
		{   
			// selectionner les annonces soumissionnées par le client
			// utiliser la methode GET_MEMBER_ADS() !!!
			
			//!!!!! MESSSAGE TEMPORAIRE
			$this->session->set_flashdata('message', 'en cours de construction');
			redirect($_SERVER['HTTP_REFERER']); // redirection vers la précédente page
        }

		// si fournisseur connectés sélectionnés les annonces créés par le fournisseur
		if ($this->session->userdata['user_role'] >= $this->SUPPLIER)
		{   
			$data['title'] = 'Mes Annonces'; 
			$data['ad'] = $this->ad_model->get_member_ads();
			$data['create_ad'] = true;
			
			$this->load->template('pages/tile',$data);
        }
	}

    public function create_ad()
    {
		// page accessible pour les membres fournisseur ou plus
        if (!isset($this->session->userdata['user_role']) || $this->session->userdata['user_role'] < $this->SUPPLIER)
		{   
            $this->session->set_flashdata('message', 'Vous devez être connecté entant que Fournisseur pour créer une annonce');
			redirect($_SERVER['HTTP_REFERER']); // redirection vers la précédente page
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
    		// check to see if we are creating the ad
			// redirect them back to the home page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("display_all", 'refresh');
		}
		else
		{
			// display the create ad form
            // set the flash data error message if there is one
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
