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
        $this->load->model('event_model');
    }

    public function prochaines_ventes() {
        $data['title'] = 'Prochaines ventes';
        $data['prochaines_ventes'] = $this->event_model->get_upcoming_sales();
        $data['view'] = 'prochaines_ventes';
        $this->load->view('template/layout', $data);
    }
    public function view_event($id=''){
        $id= $this->uri->segment(2);
        $data['title'] = 'Détail de l\'événement';
        $data['event'] = $this->event_model->get_event_by_id($id);
        $data['articles']= $this->event_model->get_articles_by_event($id);
        $data['view'] = 'event';
        $data['id'] = $id;
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
        $data['user'] = $this->user_model->get_user_by_id($_SESSION['user_id']);
        $this->load->view('template/layout', $data);
    }

    public function subscribe_newsletter() {
        $email = $this->input->post('email');
        $response = array();
        if ($this->user_model->subscribe_newsletter($_SESSION['user_id'])) {
            $response = array('state' => 'OK');
        } else {
            $response = array('state' => 'FAILED');
        }

        echo json_encode($response);
    }

    public function unsubscribe_newsletter() {
        $email = $this->input->post('email');
        $response = array();
        if ($this->user_model->unsubscribe_newsletter($_SESSION['user_id'])) {
            $response = array('state' => 'OK');
        } else {
            $response = array('state' => 'FAILED');
        }

        echo json_encode($response);
    }

}
