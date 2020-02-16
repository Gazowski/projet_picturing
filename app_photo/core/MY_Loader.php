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
     * @param bool $is_admin : si utilisateur admin , le header et le menu est différent
     */
    public function template($page, $vars = array(), $is_admin)
    {

        if($is_admin)
        {
            /**
             * !!! ATTENTION : MODIFIER LES PAGES !!!
             */
            $header = 'pages/header_catalog';
            $menu = 'pages/menu';
        }
        else
        {
            $header = 'pages/header_catalog';
            $menu = 'pages/menu';
        }

        $this->view('pages/head', $vars, $return);
        $this->view($header, $vars, $return);
        $this->view($menu, $vars, $return);
        ($page == 'pages/list' || $page == 'pages/tile') ? $this->load->view('pages/filter',$vars,$return) : '';
        $this->view($page, $vars, $return);
        $this->view('pages/footer', $vars, $return);

    }
}

