<?php

function checkPlayerValidity(){
    $errors = [];

    if(empty($_POST['prenom'])){
        $errors[] = 'Veuillez saisir un prenom';
    }

    if(empty($_POST['nom'])){
        $errors[] = 'Veuillez saisir un nom';
    }

    if(empty($_POST['anniversaire'])){
        $errors[] = 'Veuillez selectionner une date de naissance';
    }

    $postes = ['Gardien', 'Défenseur', 'Milieu', 'Attaquant'];

    if(!in_array($_POST['poste'], $postes)){
        $errors[] = 'Le poste sélectionné n\'est pas valide';
    }

    return $errors;
    }


?>