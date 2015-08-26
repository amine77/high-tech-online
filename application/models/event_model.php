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
        $sql = "select * from event_article, articles, categories
        where event_article.article_id = articles.id
        and categories.id = articles.category_id
        and articles.actif=1
        and event_article.event_id=$id";
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
