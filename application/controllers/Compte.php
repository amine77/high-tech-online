<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Compte extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Event_model');
        $this->load->model('Article_model');
    }

    public function signup() {
        $username = $this->input->post("txt_username");
        $password = $this->input->post("txt_password");
        $mail = $this->input->post("txt_mail");

        $this->form_validation->set_rules("txt_username", "Login", "trim|required");
        $this->form_validation->set_rules("txt_password", "Mot de passe", "trim|required");
        $this->form_validation->set_rules("txt_mail", "E-mail", "trim|required|valid_email");

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'un titre';
            $data['view'] = 'signup';
             $data['categories'] = $this->Article_model->get_all_categories();
            $this->load->view('template/layout', $data);
        } else {

            //validation succeeds
            if ($this->input->post('btn_signup') == "Créer mon compte") {
                if ($this->User_model->mail_exists($mail)) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Ce mail est déjà pris par un autre utilisateur. Veuillez choisir un autre !
                  </div>');
                    redirect('signup');
                }

                if ($this->User_model->username_exists($username)) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Ce nom d\'utilisateur est déjà pris. Veuillez choisir un autre !
                  </div>');
                    redirect('signup');
                }

                $last_insert_id = $this->User_model->signup_user($username, $password, $mail);
                if ($last_insert_id != '') {

                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Félicitations ! '
                            . 'Votre inscription a été créée avec succès. Vous allez être rédirigé vers l\'accueil d\'ici à quelques instants</div>'
                            . '<script>setTimeout(function(){ document.location.href="' . base_url("/") . ' ";}, 10000) </script>');
                    $sessiondata = array(
                        'login' => $username,
                        'is_logged_in' => true,
                        'email' => $mail,
                        'user_id' => $last_insert_id
                    );
                    $this->session->set_userdata($sessiondata);
                    redirect('signup');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Un problème est survenu. Votre inscription a échoué.</div>');
                    redirect('signup');
                }
            } else {
                redirect('signup');
            }
        }
    }

    public function login() {
        $username = $this->input->post("txt_username");
        $password = $this->input->post("txt_password");

        $this->form_validation->set_rules("txt_username", "Username", "trim|required");
        $this->form_validation->set_rules("txt_password", "Password", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Connexion';
            $data['view'] = 'connexion';
//            $data['ventes_en_cours'] = $this->Event_model->get_current_sales();
             $data['categories'] = $this->Article_model->get_all_categories();
            $this->load->view('template/layout', $data);
        } else {


            if ($this->input->post('btn_login') == "Connexion") {

                $usr_result = $this->User_model->get_user($username, $password);
                if (count($usr_result) > 0) {

                    $sessiondata = array(
                        'login' => $username,
                        'is_logged_in' => true,
                        'email' => $usr_result['email'],
                        'user_id' => $usr_result['id']
                    );
                    $this->session->set_userdata($sessiondata);
                    redirect(base_url());
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Login et mot de passe invalides
                  </div>');
                    redirect('login');
                }
            } else {
                redirect('login');
            }
        }
    }

    public function logout() {
        session_destroy();
        redirect(base_url('/'), 'refresh');
    }

}
