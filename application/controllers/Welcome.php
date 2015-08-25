<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $data['title'] = 'Accueil';
        $data['view'] = 'home';
        $this->load->view('template/layout', $data);
    }

    public function test($name) {
        echo 'Hello ' . $name;
    }

}
