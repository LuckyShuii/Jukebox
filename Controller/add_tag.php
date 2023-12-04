<?php

/**
 * Objectif de ce script
 * Créer une nouvelle étiquette / un nouveau tag
 * Mais avant ça, vérifier si elle existe déjà pour ne pas créer de doublon
 */

include('id.php');

if (isset($_GET['tag_name'])) {

    if (!empty($_GET['tag_name'])) {

        require('../Model/select_tag_name.php');

        if (empty($resultat)) {

            require('../Model/insert_new_tag.php');
        } else {

            echo "Cette étiquette existe déjà";
        }
    } else {

        echo "Nom d'étiquette vide";
    }
} else {

    echo "Nom d'étiquette vide";
}
