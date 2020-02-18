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
    //     $this->CI->load->model('ad_model');

    //     if ( ! file_exists(APPPATH.'views/pages/tile.php'))
    //     {
    //         // Whoops, we don't have a page for that!
    //         show_404();
    //     }
        
        
    //     $data['title'] = 'Liste des Annonces'; // Capitalize the first letter
    //     $data['ad'] = $this->CI->ad_model->get_ad();
    //     $data['filter'] = [
    //         'newest_first' => 'plus récent',
    //         'oldest_first' => 'plus ancien'
    //     ];

    //     $this->CI->load->template('pages/tile',$data);
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