 
    <?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * MY_Loader
 * affiche tous les composants de la page ainsi que la composant page définit en paramètre
 * 
 * a partir de stackoverflow
 * https://stackoverflow.com/questions/9540576/header-and-footer-in-codeigniter
 * 
 */
class MY_Loader extends CI_Loader {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * template : affiche tous les composant de la page
     * @param string $page : le contenu principale à afficher
     * @param array $vars : le contenu de la page
     */    
    public function template($page, $vars = array())
    {
        $this->init_role();
        $vars['menu'] = $this->menu(); 

        // icone connexion / déconnexion
        $vars['icon'] = !isset($_SESSION['user_id']) ? 'fas fa-user' : 'fas fa-sign-out-alt';
        $vars['text_icon'] = !isset($_SESSION['user_id']) ? ' Connexion' : ' Déconnexion';
        $vars['action'] = !isset($_SESSION['user_id']) ? 'login' : 'logout';
        
        // header différent si le role est supérieur a admin
        $header = $this->is_supervisor ? 'pages/header_admin' : 'pages/header_catalog';

        // select filtre
        $vars['filter'] = [
            'DESC' => 'plus récent',
            'ASC' => 'plus ancien'
        ];

        $this->view('pages/head', $vars);
        $this->view($header, $vars);
        $this->view('pages/alert');
        (strpos($page, 'list') || strpos($page,'tile')) ? $this->load->view('pages/filter',$vars) : '';
        $this->view($page, $vars);
        $this->view('pages/footer', $vars);

    }

    private function init_role()
    {
        $this->is_client = $this->is_role(10);
		$this->is_supplier = $this->is_role(20);
		$this->is_goldenSupplier = $this->is_role(30);
		$this->is_supervisor= $this->is_role(40);
		$this->is_admin = $this->is_role(50);
    }

    private function is_role($value)
    {
        return isset($_SESSION['user_role']) && $_SESSION['user_role'] >= $value; 
    }

    private function menu()
    {       
        if ($this->is_admin) 
        {
            $menu = [
                'Annonces' => [
                    'Produits' => 'index.php/ad/display_all_product',
                    'Services' => 'index.php/ad/display_all_service',
                    'Annonces' =>  'index.php/ad/display_all',
                    
                ],
                'Membres' => [
                    'Fournisseurs' => 'index.php/Member/display_all_supplier',
                    'Clients' => 'index.php/Member/display_all',
                    
                ],
                'Mon compte' => [
                    'Mon profil' =>  'index.php/member/member',
                    'Mes messages' =>  'Message/display_messages_ad',
                    'Mes annonces' =>  'index.php/controlleur/methode',
                    
                ],
                'A propos' => 'index.php/controlleur/methode a propos'
            ]; 
        }

        else if ($this->is_supervisor) 
        {
            $menu = [
                'Annonces' => [
                    'Produits' => 'index.php/ad/display_all_product',
                    'Services' => 'index.php/ad/display_all_service',
                    'Annonces' =>  'index.php/ad/display_all',
                    
                ],
                'Membres' => [
                    'Fournisseurs' => 'index.php/Member/display_all_supplier',
                    'Clients' => 'index.php/Member/display_all',
                    
                ],
                'Mon compte' => [
                    'Mon profil' =>  'index.php/member/member',
                    'Mes messages' =>  'Message/display_messages_ad',
                    'Mes annonces' =>  'index.php/controlleur/methode',
                    
                ],
                'A propos' => 'index.php/controlleur/methode a propos'
            ]; 
        }

        else if ($this->is_supplier)
        {
            $menu = [
                'Annonces' => [
                    'Produits' => 'index.php/ad/display_all_product',
                    'Services' => 'index.php/ad/display_all_service',
                    'Annonces' =>  'index.php/ad/display_all',
                    
                ],
                'Mon compte' => [
                    'Mon profil' =>  'index.php/member/member',
                    'Mes annonces' =>  'index.php/ad/member_ads',
                    'Mes messages' =>  'Message/display_messages_ad',
                    
                ],
                'A propos' => 'index.php/controlleur/methode a propos'
            ];
        }

        else if($this->is_client)
        {
            $menu = [
                'Annonces' => [
                    'Produits' => 'index.php/ad/display_all_product',
                    'Services' => 'index.php/ad/display_all_service',
                    'Annonces' =>  'index.php/ad/display_all',
                    
                ],
                'Mon compte' =>[
                    'Mon profil' =>  'index.php/member/member',
                    'Mes annonces' =>  'controlleur/methode',
                    'Mes messages' =>  'Message/display_messages_ad',
                    
                ], 
                'A propos' => 'index.php/controlleur/methode a propos'
            ];
        }

        else
        {
            $menu = [
                'Annonces' => [
                    'Produits' => 'index.php/ad/display_all_product',
                    'Services' => 'index.php/ad/display_all_service',
                    
                ],
                'S\'inscrire' => 'index.php/auth/create_user',
                'A propos' => 'index.php/controlleur/methode a propos'
            ];
        }

        return $menu;
    }

}

