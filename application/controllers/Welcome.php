<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('Event_model');
        $this->load->model('Article_model');
    }

    public function index() {
        $data['title'] = 'Accueil';
        if ($this->session->has_userdata('login')) {
            $data['ventes_en_cours'] = $this->Event_model->get_current_sales();
        }
         $data['categories'] = $this->Article_model->get_all_categories();
        $data['view'] = 'home';
        $this->load->view('template/layout', $data);
    }

    public function test($name) {
        echo 'Hello ' . $name;
    }

}
