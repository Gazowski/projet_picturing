<?php
class Ad_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library(['ion_auth']);
    }

    public function get_ad($ad)
    {
        $is_admin = $this->ion_auth->is_admin();
        $this->db->select('*');
        $this->db->from('ad');
        $this->db->join('category','category.id_category = ad.category');
        // si l'utilisateur n'est pas admin, seules les annonces activées sont sélectionnées
        !$is_admin ? $this->db->where('active',1) : '';
        $this->db->where('id_ad',$ad);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_ads($filter='DESC')
    {
        $is_admin = $this->ion_auth->is_admin();
        $this->db->select('*');
        $this->db->from('ad');
        $this->db->join('category','category.id_category = ad.category');
        $this->db->order_by('open_date', $filter);
        // si l'utilisateur n'est pas admin, seules les annonces activées sont sélectionnées
        !$is_admin ? $this->db->where('active',1) : '';           
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ad_product()
    {
        
        $this->db->select('*');
        $this->db->from('ad');
        $this->db->join('category','category.id_category = ad.category');
        $this->db->where('category.category','produit');
                
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ad_servive()
    {
        
        $this->db->select('*');
        $this->db->from('ad');
        $this->db->join('category','category.id_category = ad.category');
        $this->db->where('category.category','service');
                
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_ad($data)
    {
        return $this->db->insert('ad',$data);
    }

    public function get_category()
    {
        $this->db->select('category');
        $this->db->group_by('category');
        $query = $this->db->get('category');
        return $query->result();
    }

    public function get_category_name($category)
    {
        $this->db->select('id_category,name');
        $this->db->where('category',$category);
        return $this->db->get('category')->result_array();
    }

    public function get_unactive_ad()
    {
        $this->db->select('id,title,name,last_name,first_name,price,ad.active as ad_active');
        $this->db->from('ad');
        $this->db->join('users','users.id = ad.owner');
        $this->db->join('category','category.id_category = ad.category');
        $this->db->where('ad.active',0);          
        $query = $this->db->get();
        return $query->result_array();
    }
}