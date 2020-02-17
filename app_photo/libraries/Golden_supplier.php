<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Golden_supplier
 * 
 */

class Golden_supplier extends Supplier
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * affichage des tous les membres
     */
    public function display_all_members()
    {
        
        if ( ! file_exists(APPPATH.'views/pages/list.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        
        $data['title'] = 'Liste des Membres'; // Capitalize the first letter
        $data['table'] = $this->member_model->get_member();
        
        
        $is_admin = $this->ion_auth->is_admin();
        $this->load->template('pages/list',$data,$is_admin);
    }
    
    
}