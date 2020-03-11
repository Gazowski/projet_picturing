<?php
class Ban_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['ion_auth']);
        $this->load->helper('date');
        $this->load->model('ion_auth_model');

        $this->CLIENT = 10;
		$this->SUPPLIER = 20;
		$this->GOLDEN_SUPPLIER = 30;
		$this->SUPERVISOR = 40;
        $this->ADMIN = 50;
    }

    public function ban_member($id_member,$id_supervisor)
    {
        $data = [
            'banished_member' => $id_member,
            'admin_member' => $id_supervisor
        ];
        $is_ban = $this->db->insert('banishement',$data);
        $this->db->where('id',$id_member);
        // désactivation du membre dans la table users
        $is_disabled = $this->db->update('users',['active' => 0]);
        return $is_ban && $is_disabled;
    }

    public function unban_member($id_member)
    {
        $this->db->where('banished_member',$id_member);
        $this->db->where('date_unban',null);
        // date unban stockée en unix
        $is_unban = $this->db->update('banishement',['date_unban' => now() ]);
        // activation du membre dans la table users
        $this->db->where('id',$id_member);
        $is_enabled = $this->db->update('users',['active' => 1]);
        return $is_unban && $is_enabled;
    }

    /**
     * is_banish : vérifie si un membre est banni
     * @param int $id_member  id du membre a bannir
     * @return bool true si un banissement est en cours , false sinon
     */
    public function is_banish($id_member)
    {
        $this->db->select('*');
        $this->db->from('banishement');
        $this->db->where('banished_member',$id_member);
        $this->db->where('date_unban',null);
        $query = $this->db->get();
        return $query->row_array();
    }


}