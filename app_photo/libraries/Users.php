<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Users
 * 
 */

class Users {

    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
        // Assign the CodeIgniter super-object
		$this->CI =& get_instance();
		$this->CI->load->helper(array('form', 'url'));
		$this->CI->load->library('form_validation');

    }

    public function get_all_ads()
    {
        $this->CI->load->model('ad_model');

        if ( ! file_exists(APPPATH.'views/pages/tile.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        
        $data['title'] = 'Liste des Annonces'; // Capitalize the first letter
        $data['ad'] = $this->CI->ad_model->get_ad();
        $data['filter'] = [
            'newest_first' => 'plus récent',
            'oldest_first' => 'plus ancien'
        ];

        $this->CI->load->template('pages/tile',$data);
    }

    public function create_ad()
    {
        $this->CI->load->model('ad_model');
        $this->data['page_title'] = 'Ajouter une annonce';

		// validate form input
		$this->CI->form_validation->set_rules('title', 'Titre de l\'annonce', 'trim|required');
		$this->CI->form_validation->set_rules('category', 'Catégorie', 'trim|decimal|required');
		$this->CI->form_validation->set_rules('types', 'Type', 'trim|decimal|required');
		$this->CI->form_validation->set_rules('description','Description', 'trim');
		$this->CI->form_validation->set_rules('price', 'Prix', 'trim|decimal|required');
		$this->CI->form_validation->set_rules('photo','Photo','trim');
		$this->CI->form_validation->set_rules('location','Adresse','trim');

		if ($this->CI->form_validation->run() === TRUE)
		{
			$data = [
				'title' => $this->input->post('title'),
				//'types' => $this->input->post('types'),
				'category' => $this->input->post('category'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
				'photo' => $this->input->post('photo'),
				'location' => $this->input->post('location'),
			];
        }
        // ajout de l'annonce dans la DB
		if ($this->CI->form_validation->run() === TRUE && $this->CI->ad_model->add_ad($data))
		{


            // REDIRECTION : faire la redirection en js.

			// check to see if we are creating the ad
			// redirect them back to the admin page
			// $this->session->set_flashdata('message', $this->CI->ion_auth->messages());
			// redirect("", 'refresh');
		}
		else
		{
			// display the create ad form
            // set the flash data error message if there is one
            // MESSAGE ERREUR _____ A ADAPTER !!!!!!!!!!!!!!
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->CI->ion_auth->errors() ? $this->CI->ion_auth->errors() : $this->CI->session->flashdata('message')));

			$this->data['title'] = [
				'name' => 'titre',
				'id' => 'title',
				'type' => 'text',
				'value' => $this->CI->form_validation->set_value('title'),
			];
			$this->data['type'] = [
				'name' => 'type',
                'id' => 'type',
                'option' => $this->CI->ad_model->get_category(),
				'type' => 'select',
				'value' => $this->CI->form_validation->set_value('type'),
			];
			$this->data['category'] = [
				'name' => 'categorie',
				'id' => 'category',
				'option' => ['choisir un type'],
				'type' => 'select',
				'value' => $this->CI->form_validation->set_value('category'),
			];
			$this->data['description'] = [
				'name' => 'description',
				'id' => 'description',
				'type' => 'text',
				'value' => $this->CI->form_validation->set_value('description'),
			];
			$this->data['price'] = [
				'name' => 'prix',
				'id' => 'price',
				'type' => 'text',
				'value' => $this->CI->form_validation->set_value('price'),
			];
			$this->data['photo'] = [
				'name' => 'photo',
				'id' => 'photo',
				'type' => 'text',
				'value' => $this->CI->form_validation->set_value('photo'),
			];
			$this->data['location'] = [
				'name' => 'adresse',
				'id' => 'location',
				'type' => 'text',
				'value' => $this->CI->form_validation->set_value('location'),
			];

			$this->CI->load->template('pages/create_ad_form',$this->data);
		}
    }
}

class Customer extends Users 
{
    public function __construct()
    {
        parent::__construct();
    }

}





// class Admin extends Golden_supplier
// {
//     public function __construct()
//     {
//         parent::__construct();
//         $this->CI->load->model('member_model');

//     }

//     public function display_all_member()
//     {
        
//         if ( ! file_exists(APPPATH.'views/pages/list.php'))
//         {
//             // Whoops, we don't have a page for that!
//             show_404();
//         }
        
        
//         $data['title'] = 'Liste des Membres'; // Capitalize the first letter
//         $data['table'] = $this->CI->member_model->get_member();

//         $this->load->template('pages/list',$data,TRUE);
//     }
// }