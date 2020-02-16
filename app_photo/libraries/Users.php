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

        $this->load->template('pages/tile',$data);
    }
}