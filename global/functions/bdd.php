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
    $request = $bdd->prepare("SELECT `id`,`prenom`,`nom` , TIMESTAMPDIFF(YEAR, `date_daissance`, DATE(NOW())) age,`poste`
    FROM `team` ");
    $request->execute();

    $resultat = $request->fetchAll();

    return $resultat;
}

function getPlayer($bdd, $id){
    $request = $bdd->prepare("SELECT * FROM `team` WHERE id= :id");
    $request->execute(['id'=> $id]);

    $resultat = $request->fetch();

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
                'date_naissance'=> $date,
                'poste'=> $poste
            ]);

            $_SESSION['message']['statut']=1;
            $_SESSION['message']['text']='Joueur ajouté avec succes';
    } catch (\PDOException $e){
        // var_dump($e);
        $_SESSION['message']['statut']=0;
        $_SESSION['message']['text']='l\'enregistrement a échoué, veuillez réessayer';
    }

}

function deletePlayer($bdd, $id){
    $request = $bdd->prepare('DELETE FROM team WHERE id = :id');
    $request->execute(['id'=> $id]);
}

function editPlayer($bdd, $id, $prenom, $nom, $birthdate, $poste){
    try{
        $request = $bdd->prepare("UPDATE team SET prenom = :prenom, nom = :nom, date_daissance = :birthdate, poste= :poste WHERE id = :id");
    
        $request->execute([
            'prenom'=> $prenom,
            'nom'=> $nom,
            'birthdate'=> $birthdate,
            'poste'=>$poste,
            'id'=> $id
        ]);
        $_SESSION['message']['statut']=1;
        $_SESSION['message']['text']='Joueur modifié avec succes';
    } catch (\PDOException $e){
        var_dump($e);
        $_SESSION['message']['statut']=0;
        $_SESSION['message']['text']='la modification a échouée, veuillez réessayer';
    }
}




