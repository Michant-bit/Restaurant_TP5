<?php

require_once 'framework/Modele.php';

/**
 * Fournit les services d'accès aux types de menus 
 * 
 * @author Antoine La Boissière
 */
class Type extends Modele {

// Recherche les types répondant à l'autocomplete
    public function searchType($term) {
        $sql = 'SELECT type FROM types WHERE type LIKE :term';
        $stmt = $this->executerRequete($sql, ['term' => '%' . $term . '%']);

        while ($row = $stmt->fetch()) {
            $return_arr[] = $row['type'];
        }

        /* Toss back results as json encoded array. */
        return json_encode($return_arr);
    }

}