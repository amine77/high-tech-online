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

    function get_produits_phares() {
        $sql = " select  a.id, a.name, a.img, a.stock, a.description, a.prix , cat.title, count(a.id) as nb_commandes  from lignes_commandes lc , commandes c, articles a , categories cat
        where lc.commande_id = c.id 
        and lc.article_id = a.id
        and cat.id = a.category_id
        and c.date_achat >= DATE_SUB(CONCAT(CURDATE(), ' 00:00:00'), INTERVAL 3 DAY)
        group by a.id
        order by nb_commandes desc limit 10";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function get_all_categories(){
        $query = $this->db->get('categories');
         if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    function get_articles_by_category($id){
        $sql = "select a.id , a.name, a.img, a.stock, a.prix, a.description from articles a where a.category_id = $id and a.actif = 1 ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function get_category_by_id($id){
        $query = $this->db->get_where('categories', array('id' => $id));
         if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

}
