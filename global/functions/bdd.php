<?php

//crée un objet PDO pour se connecter à la BDD
function connectBDD(){
    global $host, $dbName, $user, $password;
    try {
        $bdd = new PDO(
            'mysql:host='.$host.';dbname='.$dbName.';charset=utf8',
            $user,
            $password);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        throw new InvalidArgumentException('Erreur connexion à la base de données : '.$e->getMessage());
        // exit;
    }
    return $bdd;

}



function getAllPlayers($bdd){
    $request = $bdd->prepare("SELECT * FROM team");
    $request->execute();

    $resultat = $request->fetchAll();

    return $resultat;
}


function addPlayer($bdd, $prenom, $nom, $date, $poste){
    try {
        $request = $bdd->prepare("INSERT INTO team (prenom, nom, date_daissance, poste)
    VALUE (:prenom, :nom, :date_naissance, :poste)");

        $request->execute(
            [
                'prenom'=> $prenom,
                'nom'=> $nom,
                'date_daissance'=> $date,
                'poste'=> $poste
            ]);
    } catch (\PDOException $e){
        // var_dump($e);
        $_SESSION['addPlayer']='error';
    }

    $_SESSION['addPlayer']='success';
}

// function getAllArticles($pdo){
//     $request = $pdo->prepare("SELECT * FROM annonce");
//     $request->execute();

//     $resultat = $request->fetchAll();

//     return $resultat;
// }

// function deleteArticle($pdo, $idToDelete){
//     $request = $pdo->prepare('DELETE FROM annonce WHERE id = :id');
//     $request->execute(['id'=> $idToDelete]);
// }

// function getOneArticle($pdo, $id){
//     $request = $pdo->prepare("SELECT * FROM annonce WHERE id = :id");
//     $request->execute(['id'=> $id]);

//     return $request->fetch();
// }

// function editArticle($pdo, $titre, $type, $contenu, $imageLink, $id){
//     $request = $pdo->prepare("UPDATE annonce SET titre = :titre, type = :type,
//                image_lien = :image, contenu = :contenu WHERE id = :id");

//     $request->execute([
//         'titre'=> $titre,
//         'type'=> $type,
//         'contenu'=> $contenu,
//         'image'=> $imageLink,
//         'id'=> $id
//     ]);
// }