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

    /**
     * template : affiche tous les composant de la page
     * @param string $page : le contenu principale à afficher
     * @param array $vars : le contenu de la page
     */    
    public function template($page, $vars = array())
    {
        $is_admin = $this->is_role(50); 
        $is_superviseur = $this->is_role(40); 
        $is_fournisseur_or = $this->is_role(30); 
        $is_fournisseur = $this->is_role(20); 
        $is_client = $this->is_role(10); 


        // menu selon le role
        // KERVENS, compléte ici la variable $vars['menu']
        // ta variable doit commencer comme ci-dessous:

        

            $vars['menu'] = [
                'annonces' => [
                    'produits' => 'ad/display_all_product',
                    'services' => 'ad/display_all_service'
                    
                ],
                'S\'inscrire' => 'auth/create_user',
                'a propos' => 'controlleur/methode a propos'
            ];
             if($is_client)
            {
                $vars['menu'] = [
                    'annonces' => [
                        'produits' => 'ad/display_all_product',
                        'services' => 'ad/display_all_service'
                        
                    ],
                    'Mon compte' =>[
                        'Mon profile' =>  'controlleur/methode',
                        'Mes soumissions' =>  'controlleur/methode',
                        'Mes messages' =>  'controlleur/methode',
                        
                    ], 
                    'a propos' => 'controlleur/methode a propos'
                ];
            }
            else if($is_fournisseur)
            {
                $vars['menu'] = [
                    'annonces' => [
                        'produits' => 'ad/display_all_product',
                        'services' => 'ad/display_all_service'
                        
                    ],
                    'Mon compte' =>[
                        'Mon profile' =>  'controlleur/methode',
                        'Mes annonces' =>  'controlleur/methode',
                        'Mes messages' =>  'controlleur/methode',
                        
                    ],
                    'a propos' => 'controlleur/methode a propos'
                ];
            }
           /*  ... continuer jusqua admin */
 
        

        // icone connexion / déconnexion
        $vars['icon'] = !isset($_SESSION['user_id']) ? 'fas fa-user' : 'fas fa-sign-out-alt';
        $vars['text_icon'] = !isset($_SESSION['user_id']) ? ' Connexion' : ' Déconnexion';
        $vars['action'] = !isset($_SESSION['user_id']) ? 'login' : 'logout';
        
        // header différent si le role est supérieur a admin
        $header = $is_superviseur ? 'pages/header_admin' : 'pages/header_catalog';

        $this->view('pages/head', $vars);
        $this->view($header, $vars);
        $this->view('pages/alert');
        (strpos($page, 'list') || strpos($page,'tile')) ? $this->load->view('pages/filter',$vars) : '';
        $this->view($page, $vars);
        $this->view('pages/footer', $vars);

    }

    private function is_role($value)
    {
        return isset($_SESSION['user_role']) && $_SESSION['user_role'] >= $value; 
    }

}

