<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class command_model extends CI_Model {

    function save($user_id, $montant_total, $rue, $infos, $ville, $code_postal, array $articles_in_cart) {
        //insertion dans la table  des commandes et récupérer le dernier id et l'insérer dans command_lines
        //et décompte des articles du stocks

        $data = array(
            'user_id' => $user_id,
            'rue' => $rue,
            'code_postal' => $code_postal,
            'ville' => $ville,
            'infos' => $infos,
            'montant_total' => $montant_total
        );

        $this->db->insert('commandes', $data);
        $commande_id = $this->db->insert_id();

        foreach ($articles_in_cart as $key => $article) {
            $data_article = array(
                'commande_id' => $commande_id,
                'article_id' => $article['article_id']
            );
            $this->db->insert('lignes_commandes', $data_article);
        }

        foreach ($articles_in_cart as $key => $article) {
            $article_id = $article['article_id'];
            $nb_copies = $article['nb_copies'];
            $this->db->set('stock', "stock-$nb_copies", FALSE);
            $this->db->where('id', $article_id);
            $this->db->update('articles');
            
        }
        return true;
    }

}
