<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Secured extends CI_Controller {

    public function __construct() {

        parent::__construct();
        if ($this->session->has_userdata('login')) {
            if ($this->session->userdata('role') == 'ROLE_ADMIN') {
                redirect(base_url());
            }
        } else {
            redirect(base_url('login'));
        }

        $this->load->model('user_model');
    }

    public function prochaines_ventes() {
        $data['title'] = 'Prochaines ventes';
        $data['view'] = 'prochaines_ventes';
        $this->load->view('template/layout', $data);
    }

    public function produits_phares() {
        $data['title'] = 'Produits phares';
        $data['view'] = 'produits_phares';
        $this->load->view('template/layout', $data);
    }

    public function newsletter() {
        $data['title'] = 'Newsletter';
        $data['view'] = 'newsletter';
        $this->load->view('template/layout', $data);
    }

}
