<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user_model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    

    function get_all()
    {
        $sql = "SELECT * FROM users WHERE role_id =3";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_roles_by_user($user_id)
    {
        $sql = "SELECT * FROM role, users where users.role_id = role.role_id and user_id = '" . $user_id . "' ";
        $query = $this->db->query($sql)->row();
        return $query;
    }

    //get the username & password from tbl_usrs
    function get_user($usr, $pwd)
    {
        $sql = "SELECT * FROM users, role WHERE role.role_id = users.role_id AND login = '" . $usr . "' AND password = '" . sha1($pwd) . "' ";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function get_user_by_id($user_id)
    {
        $sql = "SELECT * FROM users WHERE user_id = '" . $user_id . "' ";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function get_user_by_mail($email)
    {
        $this->db->where('mail', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }


    function signup_user($user_name, $user_surname, $login, $password, $born_at, $phone, $mobile, $mail)
    {

        $data = array(
            'user_name' => $user_name,
            'user_surname' => $user_surname,
            'login' => $login,
            'password' => sha1($password),
            'born_at' => $born_at,
            'phone' => $phone,
            'mobile' => $mobile,
            'mail' => $mail,
            'role_id' => 3   //par défaut les utilisateurs qui se connectent auront ROLE_USER
        );

        $this->db->insert('users', $data);
        return ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.
    }

    function mail_exists($key)
    {
        $this->db->where('mail', $key);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function delete_user($id)
    {
        $this->db->delete('users', array('user_id' => $id));
    }

}

?>