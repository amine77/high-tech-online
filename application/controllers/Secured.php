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

        $this->load->model('User_model');
        $this->load->model('Event_model');
        $this->load->model('Article_model');
        $this->load->model('Command_model');
    }

    public function prochaines_ventes() {
        $data['title'] = 'Prochaines ventes';
        $data['prochaines_ventes'] = $this->Event_model->get_upcoming_sales();
        $data['view'] = 'prochaines_ventes';
        $data['categories'] = $this->Article_model->get_all_categories();
        $this->load->view('template/layout', $data);
    }

    public function view_article($id = '') {
        $id = $this->uri->segment(2);
        $event_id = $this->uri->segment(3);
        $data['title'] = 'Détail de l\'article';
        $data['view'] = 'article';
        $data['event_id'] = $event_id;
        $data['article'] = $this->Article_model->get_article_by_id($id);
        $data['categories'] = $this->Article_model->get_all_categories();
        $this->load->view('template/layout', $data);
    }

    public function delete_from_cart($article_id = '') {
        $article_id = $this->uri->segment(2);
        $articles_in_cart = $this->session->userdata('articles_in_cart');
        foreach ($articles_in_cart as $key => $article1) {
            if ($article1['article_id'] == $article_id) {
                unset($articles_in_cart[$key]);
            } 
        }
        $this->session->set_userdata('articles_in_cart', $articles_in_cart);
        redirect('view_cart');
    }

    public function paye_command() {
        $user_id = $this->session->userdata('user_id');
        $response = array();

        $montant_total = $this->input->post('montant_total');
        $rue = $this->input->post('rue');
        $infos = $this->input->post('infos');
        $ville = $this->input->post('ville');
        $code_postal = $this->input->post('code_postal');
        
        $articles_in_cart = $this->session->userdata('articles_in_cart');
        if($this->Command_model->save($user_id, $montant_total, $rue, $infos, $ville, $code_postal, $articles_in_cart)){
            $articles_in_cart=array();
            $this->session->set_userdata('articles_in_cart', $articles_in_cart);
            $response = array('state' => 'OK');
        }else{
            $response = array('state' => 'FAILED');
        }
        

        echo json_encode($response);
    }

    public function add_to_cart() {
        $message = '';
        $article_id = $this->input->post('article_id');
        $nb_copies = $this->input->post('nb_copies');
        $prix_unitaire = $this->input->post('prix_unitaire');
        $name = $this->input->post('name');
        $img = $this->input->post('img');
        $article = array('article_id' => $article_id, 'nb_copies' => $nb_copies, 'prix_unitaire' => $prix_unitaire, 'img' => $img, 'name' => $name);
        if ($this->session->has_userdata('articles_in_cart')) {

            $articles_in_cart = $this->session->userdata('articles_in_cart');
            foreach ($articles_in_cart as $key => $article1) {
                if ($article1['article_id'] == $article_id) {
                    $message = 'article existe';
                    unset($articles_in_cart[$key]);
                } else {
                    $message = 'article introuvable';
                }
            }
            array_push($articles_in_cart, $article);
            $this->session->set_userdata('articles_in_cart', $articles_in_cart);
        } else {
            $articles_in_cart = array();
            $articles_in_cart[] = $article;
            $this->session->set_userdata('articles_in_cart', $articles_in_cart);
        }
        $response = array('state' => 'OK', 'message' => $message);
        echo json_encode($response);
    }

    public function view_category ($id = ''){
        $id = $this->uri->segment(2);
        $data['title'] = 'Liste des articles';
        $data['articles'] = $this->Article_model->get_articles_by_category($id);
        $data['category'] = $this->Article_model->get_category_by_id($id);
        $data['view'] = 'category';
        $data['id'] = $id;
        $data['categories'] = $this->Article_model->get_all_categories();
        $this->load->view('template/layout', $data);
    }
    public function view_event($id = '') {
        $id = $this->uri->segment(2);
        $data['title'] = 'Détail de l\'événement';
        $data['event'] = $this->Event_model->get_event_by_id($id);
        $data['articles'] = $this->Event_model->get_articles_by_event($id);
        $data['view'] = 'event';
        $data['id'] = $id;
        $data['categories'] = $this->Article_model->get_all_categories();
        $this->load->view('template/layout', $data);
    }

    public function view_cart() {
        $data['title'] = 'Mon panier';
        //$data['articles_dans_panier']= $this->Event_model->get_articles_by_event($id);
        $data['view'] = 'cart';
        $data['categories'] = $this->Article_model->get_all_categories();
        $this->load->view('template/layout', $data);
    }

    public function view_event_with_cart($id = '') {
        $id = $this->uri->segment(2);
        $data['title'] = 'Détail de l\'événement';
        $data['event'] = $this->Event_model->get_event_by_id($id);
        $data['articles'] = $this->Event_model->get_articles_by_event($id);
        $data['view'] = 'event_with_cart';
        $data['id'] = $id;
        $data['categories'] = $this->Article_model->get_all_categories();
        $this->load->view('template/layout', $data);
    }

    public function produits_phares() {
        $data['title'] = 'Produits phares';
        $data['view'] = 'produits_phares';
        $data['articles'] = $this->Article_model->get_produits_phares();
        $data['categories'] = $this->Article_model->get_all_categories();
        $this->load->view('template/layout', $data);
    }

    public function newsletter() {
        $data['title'] = 'Newsletter';
        $data['view'] = 'newsletter';
        $data['user'] = $this->User_model->get_user_by_id($_SESSION['user_id']);
        $data['categories'] = $this->Article_model->get_all_categories();
        $this->load->view('template/layout', $data);
    }

    public function subscribe_newsletter() {
        $email = $this->input->post('email');
        $response = array();
        if ($this->User_model->subscribe_newsletter($_SESSION['user_id'])) {
            $response = array('state' => 'OK');
        } else {
            $response = array('state' => 'FAILED');
        }

        echo json_encode($response);
    }

    public function unsubscribe_newsletter() {
        $email = $this->input->post('email');
        $response = array();
        if ($this->User_model->unsubscribe_newsletter($_SESSION['user_id'])) {
            $response = array('state' => 'OK');
        } else {
            $response = array('state' => 'FAILED');
        }

        echo json_encode($response);
    }

}
