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

    function checkUserValidity($bdd){
        $errors = [];

        if(empty($_POST['login']) || empty($_POST['pwd'])){
            $errors[] = 'Vous devez saisir un identifiant et un mot de passe';
        }else{
            // var_dump($_POST);
            $user= getuserByName($bdd, $_POST['login']);
            // var_dump($user);
            if(!$user){
                $errors[] ='Utilisateur inconnu';
            }elseif(!password_verify($_POST['pwd'], $user['password'])){
                $errors[] ='Mot de passe incorrect';
            }
        }
        return $errors;
    }


?>