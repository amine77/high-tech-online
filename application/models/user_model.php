<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all() {
        $sql = "SELECT * FROM users WHERE role_id =3";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_roles_by_user($user_id) {
        $sql = "SELECT * FROM role, users where users.role_id = role.role_id and user_id = '" . $user_id . "' ";
        $query = $this->db->query($sql)->row();
        return $query;
    }

    //get the username & password from tbl_usrs
    function get_user($usr, $pwd) {
        $sql = "SELECT * FROM users WHERE username = '" . $usr . "' AND password = '" . sha1($pwd) . "' ";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row_array();
    }

    function get_user_by_mail($email) {
        $this->db->where('mail', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function subscribe_newsletter($user_id) {
        $data = array(
            'in_newsletter' => 1
        );

        $this->db->where('id', $user_id);
        if ($this->db->update('users', $data)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    function unsubscribe_newsletter($user_id) {
        $data = array(
            'in_newsletter' => 0
        );

        $this->db->where('id', $user_id);
        if ($this->db->update('users', $data)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    function signup_user($username, $password, $mail) {

        $data = array(
            'username' => $username,
            'password' => sha1($password),
            'email' => $mail
        );

        $this->db->insert('users', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function mail_exists($key) {
        $this->db->where('email', $key);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function delete_user($id) {
        $this->db->delete('users', array('user_id' => $id));
    }

}

?>