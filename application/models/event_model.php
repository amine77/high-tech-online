<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class event_model extends CI_Model {

    function get_upcoming_sales() {
        $sql = "SELECT * FROM events WHERE date_debut > NOW()";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function get_current_sales() {
        $sql = "SELECT * FROM events WHERE date_debut < NOW() and date_fin > NOW() ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_articles_by_event($id) {
        $sql = "select a.id, a.name, a.stock, a.img, a.prix,a.description, c.title from event_article ea, articles a, categories c
        where ea.article_id = a.id
        and c.id = a.category_id
        and a.actif=1
        and ea.event_id=$id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_event_by_id($id) {
        $sql = "select * from events where id=$id ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

}
