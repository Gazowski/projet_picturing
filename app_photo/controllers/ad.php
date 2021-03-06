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
        $this->load->library(['ion_auth','session','user_agent','mahana_messaging']);
        $this->load->model('ion_auth_model');
        $this->load->model('mahana_model');
		$this->load->model('ad_model');
		$this->data['msg_unread'] = $this->is_msg_unread();
		
		$this->is_admin = $this->ion_auth->is_admin();
		//$this->breadcrumb();
		$this->detect_browser();
		
		$this->CLIENT = 10;
		$this->SUPPLIER = 20;
		$this->GOLDEN_SUPPLIER = 30;
		$this->SUPERVISOR = 40;
		$this->ADMIN = 40;
	}

	/**
	 * detect_browser
	 * enregistre le nom et la version du navigateur en variable session
	 * initialise la variable session is_IE a 'true' ou 'false' si le navigateur est IE
	 * (surtout utilisé dans la fonction template de core/MY_Loader)
	 */	
	private function detect_browser()
	{
		$this->agent = [
			'agent_name' => $this->agent->is_browser() ?  $this->agent->browser() : null,
			'agent_version' => $this->agent->is_browser() ?  $this->agent->version() : null,
			'is_IE' => $this->agent->is_browser() && $this->agent->browser() == 'Internet Explorer' ? true : false ,
		];
		$this->session->set_userdata($this->agent);
		if($this->agent['is_IE'])
		{
			$this->session->set_flashdata('message', 'Ce site n\'est pas compatible avec Internet Explorer !');
		}

	}

	/**
     * breadcrumbs() : affiche le fil d'arianne
     * @param string $second (optionnel) : le nom de la 2e page dans le fil d'arianne
     * @param string $third (optionnel) : le nom de la 3e page dans le fil d'arianne
     * @return array : le fil d'arianne a afficher avec les liens vers les pages
     */
	private function breadcrumbs($second = null,$third = null)
    {
        $my_breadcrumbs = [ 'Accueil' => isset($this->session->userdata['user_role']) && $this->session->userdata['user_role'] >= 40 ? 'index.php/member/admin_home':'index.php/ad/display_all' ];
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
	
	private function is_msg_unread(){

		if (isset($this->session->userdata['user_id'])){
			$user_id = $this->session->userdata['user_id'];
			$msg_status = $this->mahana_model->get_unread_message_by_user($user_id);
			
			if (empty($msg_status)){
				return false;
			} else {
				return true;
			}
		}
		return false;
	}


	/**
	 * display_ad() : affiche l'annonce passée en paramètre
	 * @param { int } $id_ad : identifiant de l'annonce
	 * Accessible pour tous
	 */
	public function display_ad($id_ad)
    {
        if ( ! file_exists(APPPATH.'views/pages/detail_ad.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

		// enregistrement du owner ed l'id annonce en session (permet de restreindre la modif au owner seul)

        
		$this->data['title'] = 'Information Annonce';        
        $this->data['ad'] = $this->ad_model->get_ad($id_ad);
        $this->session->set_userdata('ad_owner',$this->data['ad']['owner']);
		$this->session->set_userdata('id_ad',$id_ad);

		//affichage du bouton superviseur
		$this->ad_active = $this->data['ad']['active'];
		$supervisor_btn_view = function(){
			$this->data['is_enabled'] = $this->ad_active;
			$this->load->view('pages/btn_member/supervisor_btn',$this->data);
		};
		// le bouton est affiché si l'utilisateur est superviseur ou + et si l'annnonce n'est pas active
		$is_supervisor = $this->session->userdata['user_role'] >= 40 && $this->data['ad']['active'] == 0 ;
		$this->data['supervisor_btn'] = $is_supervisor ? $supervisor_btn_view : null;
		
		// breadcrumb
		$this->data['breadcrumbs'] = $this->breadcrumbs('liste','annonce');
	
        $this->load->template('pages/detail_ad',$this->data);
	}
	
    public function display_all()
    {

        if ( ! file_exists(APPPATH.'views/pages/tile.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
		
        $this->data['title'] = 'Liste des Annonces'; // Capitalize the first letter
		$this->data['ad'] = $this->ad_model->get_ads();
		

		$this->data['breadcrumbs'] = $this->breadcrumbs();
        $this->load->template('pages/tile',$this->data);
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
        
        
        $this->data['title'] = 'Liste des Produits'; // Capitalize the first letter
        $this->data['ad'] = $this->ad_model->get_ad_product();

		// breadcrumb
		$this->data['breadcrumbs'] = $this->breadcrumbs('liste');

        $this->load->template('pages/tile',$this->data);
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
        
        
        $this->data['title'] = 'Liste des services';
        $this->data['ad'] = $this->ad_model->get_ad_service();

		// breadcrumb
		$this->data['breadcrumbs'] = $this->breadcrumbs('liste');

        $this->load->template('pages/tile',$this->data);
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
			$this->data['title'] = 'Mes Annonces'; 
			$this->data['ad'] = $this->ad_model->get_member_ads();
			$this->data['create_ad'] = true;
			
			// breadcrumb
			$this->data['breadcrumbs'] = $this->breadcrumbs('mes annonces');

			$this->load->template('pages/tile',$this->data);
        }
	}

	/**
	 * create_ad
	 * formulaire création annonce
	 * l'ajout d'une annonce se fait en 2 étapes:
	 * 	- 1. ajout de l'annonce
	 *  - 2. ajout des photos (méthode form_photo)
	 */
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
		$this->form_validation->set_rules('category', 'Catégorie', 'trim|required');
		$this->form_validation->set_rules('type', 'Type', 'trim|required');
		$this->form_validation->set_rules('description','Description', 'trim');
		$this->form_validation->set_rules('price', 'Prix', 'trim|required');
		$this->form_validation->set_rules('location','Adresse','trim');

		if ($this->form_validation->run() === TRUE)
		{
			$this->data = [
				'title' => $this->input->post('title'),
				'category' => $this->input->post('category'),
				'description' => $this->input->post('description'),
				'price' => intval($this->input->post('price')),
                'location' => $this->input->post('location'),
                'owner' => $this->ion_auth->user()->row()->id,
			];
			// mémorisation de la catégory (pour le nombre de photo)
			$this->type = $this->input->post('type');
        }
        // ajout de l'annonce dans la DB
		if ($this->form_validation->run() === TRUE && $this->ad_model->add_ad($this->data))
		{
			
			// ouverture du formulaire d'ajout photo
			$this->photo_form();
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
			$this->data['location'] = [
				'name' => 'location',
				'id' => 'location',
				'type' => 'text',
				'value' => $this->form_validation->set_value('location'),
			];

			// breadcrumb
			$data['breadcrumbs'] = $this->breadcrumbs('annonces','votre annonce');

			$this->load->template('pages/create_ad_form',$this->data);
		}
	}



    /**
	 * photo_form()
	 * affichage du formulaire d'ajout de photo.
	 * 	- utilisation de la library 'uploading' de codeigniter
	 *  - la méthode est appelé apres la validation du formulaire 'create_ad'
	 *  - création de la vue views/pages/photo_form.php
	 *  - la vue est appelé par photo_form
	 *  - la photo est téléverser par la méthode upload_photo
	 *  - l'url est de la photo est ajouté dans la db 
	 */
	public function photo_form()
	{
		$this->data['message'] = '';
		$this->data['title'] = 'Ajout photo';
		$this->session->set_userdata('nb_photo', $this->type == 'produit' ? 3 : 1);
		$this->data['nb_photo'] = $this->session->userdata['nb_photo'];
		$this->load->template('pages/photo_form',$this->data);
	}
	
	public function upload_photo()
	{
		$config['upload_path']          = './assets/img';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2000; // kB
		$config['max_width']            = 2000; // px
		$config['max_height']           = 2000; // px
		
		$this->load->library('upload', $config);

		$url_photo = [];
		$nb_photo = $this->session->userdata['nb_photo'];
		// on vérifie l'ajout de chaque photo
		for($i=1;$i<=$nb_photo;$i++)
		{
			if (!empty($_FILES['photo'.$i]['name']) && !$this->upload->do_upload('photo'.$i))
			{
				$this->session->set_flashdata('message', $this->upload->display_errors());
				// retour vers le formulaire d'ajout photo
				redirect("photo_form", 'refresh');
			}
			else if(!empty($_FILES['photo'.$i]['name']))
			{ 
				$data = array('upload_data' => $this->upload->data());
				// on récupère le nom du fichier téléverser et on le mémorise
				$photo_url[] = 'assets/img/' . $data['upload_data']['file_name'];
			}
		}

		// récupération de l'id de la derniere annonce ajouté
		$last_ad = $this->session->flashdata('last_ad');
		// on enregistre le lien de la photo dans la db (le 1e paramètre est laissé vide , le model prendra la dernière id insérer)
		$store = $this->ad_model->update_ad($last_ad,['photo' => implode(',',$photo_url)]);

		// verification si la l'url a été ajouté
		if(!$store)
		{
			$this->session->set_flashdata('message', "la photo n'a pas été ajoutée, recommencez");
			redirect("photo_form", 'refresh');
		}
		else
		{
			$this->session->set_flashdata('message', 'votre annonce est en attente de validation');
			redirect('member_ads','refresh');
		}
	}


	public function a_propos()
    {

        if ( ! file_exists(APPPATH.'views/pages/a_propos.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        
        $this->data['title'] = 'A propos'; // Capitalize the first letter
	   // $this->data['ad'] = $this->ad_model->get_ads();
	   
	   	// breadcrumb
		$this->data['breadcrumbs'] = $this->breadcrumbs('à propos');

        $this->load->template('pages/a_propos',$this->data);
    }



}
