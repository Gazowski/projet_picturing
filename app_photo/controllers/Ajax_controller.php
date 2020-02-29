<?php

/**
 *  controlleur des requetes ajax
 */

 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_controller extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['users','ion_auth']);
        $this->load->model('ion_auth_model');
        $this->load->model('ad_model');

        $this->ajax_data = '';
        $this->clean_json_data();        
    }

    private function clean_json_data()
    {
        $data = $this->input->raw_input_stream;
        $data = urldecode($data);
        $this->ajax_data = json_decode($data);        
    }

    /**
     * get_category_name : affiche un 'select' avec les différentes catégorie selon le choix entre produits et service
     * accessible par les fournisseurs et +
     */

    public function get_category_name()
    {
        if (!isset($this->session->userdata['user_role']) || $this->session->userdata['user_role'] < 20)
		{
            $this->session->set_flashdata('message', 'Vous devez être connecté entant que Fournisseur pour créer une annonce');
            redirect('auth', 'refresh');
        }
        $result = $this->ad_model->get_category_name($this->ajax_data);
        $select = '';
        foreach($result as $row)
        {
            $select .= "<option value='" . $row['id_category'] . "'>" . $row['name'] . "</option>";
        }
        echo $select;
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
        
		$data['title'] = 'Information Annonce';        
        $data['ad'] = $this->ad_model->get_ad($id_ad);
        $this->session->set_userdata('ad_owner',$data['ad']['owner']);
        $this->session->set_userdata('id_ad',$data['ad']['id_ad']);
        $this->load->view('pages/detail_ad',$data);
    }

    /**
     * activate_member
     * active un membre en attente d'activation. envoi un booléen a l'appel ajax
     * Accessible pour les Superviseurs et +
     */
    public function activate_member()
    {
        if (!isset($this->session->userdata['user_role']) || $this->session->userdata['user_role'] < 40)
		{
            $this->session->set_flashdata('message', 'Vous devez être connecté entant que Superviseur pour activer un membre');
            redirect('auth', 'refresh');
        }
        
        $id_member = $this->ajax_data;
        $data = [
            'active' => 1,
        ];
        echo $this->ion_auth->update($id_member, $data);
    }

    /**
     * update_member
     * met a jour les infos du membre
     */
    public function update_member()
    {
        if (!isset($this->session->userdata['user_role']))
		{
            $this->session->set_flashdata('message', 'Vous devez être connecté');
            redirect('auth', 'refresh');
        }
        // ajax_data est un objet et a besoin d'être transformé en tableau associatif https://stackoverflow.com/questions/4345554/convert-a-php-object-to-an-associative-array
        $this->ajax_data = (array) $this->ajax_data;
        $id_member = $this->ion_auth->user()->row()->id;
        echo $this->ion_auth->update($id_member, $this->ajax_data);
    }

    /**
     * update_ad
     * met a jour les infos d'une annonce si l'utilisateur est le propriétaire de l'annonce
     */
    public function update_ad()
    {
        if ($this->session->userdata['user_id'] != $this->session->userdata['ad_owner'])
		{
            $this->session->set_flashdata('message', 'Vous n\'êtes pas le propriétaire de l\'annonce');
            redirect('auth', 'refresh');
        }
        // ajax_data est un objet et a besoin d'être transformé en tableau associatif https://stackoverflow.com/questions/4345554/convert-a-php-object-to-an-associative-array
        $this->ajax_data = (array) $this->ajax_data;
        $id_ad = $this->session->userdata['id_ad'];
        echo $this->ad_model->update_ad($id_ad, $this->ajax_data);
    }
    
    /**
     * activate_ad
     * active une annonce en attente d'activation. envoi un booléen a l'appel ajax
     * Accessible pour les Superviseurs et +
     */
    public function activate_ad()
    {
        if (!isset($this->session->userdata['user_role']) || $this->session->userdata['user_role'] < 40)
        {
            $this->session->set_flashdata('message', 'Vous devez être connecté entant que Superviseur pour activer une annonce');
            redirect('auth', 'refresh');
        }

        $id_ad = $this->ajax_data;
        $this->db->set('active',1);
        $this->db->where('id_ad',$id_ad);
        echo $this->db->update('ad');
    }
    
    public function get_ads()
    {
        $data['title'] = 'Listes des Annonces';
        
        $data['ad'] = $this->ad_model->get_ads($this->ajax_data);

        $this->load->view('pages/tile',$data);
    }
}