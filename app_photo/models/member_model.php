<?php
class Member_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }
//////////methode d'affichage des membres pour les admin////////
        public function get_member($member = false)
        {
            if ($member === FALSE)
            {
                    $this->db->select('*');
                    $this->db->from('members');
                  
                    $query = $this->db->get();
                    return $query->result_array();
            }
    
            $query = $this->db->get_where('members', array('id_members' => $member));
            return $query->row_array();
        }

//////////methode d'affichage des membres pour les fournisseurs////////
        public function get_supplier($supplier = false)
        {
            if ($supplier === FALSE)
            {
                    $this->db->select('prénom, nom, nom_entreprise, numéro_entreprise,adresse,
                                     téléphone, courriel, lien_site_web, lien_réseaux_sociaux');
                    $this->db->from('members');

                    $query = $this->db->get();
                    return $query->result_array();
            }
    
            $query = $this->db->get_where('members', array('id_members' => $supplier));
            return $query->row_array();
        }
}