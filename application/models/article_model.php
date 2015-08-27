<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class article_model extends CI_Model {

    function get_article_by_id($id) {
        $query = $this->db->get_where('articles', array('id' => $id));

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

}
