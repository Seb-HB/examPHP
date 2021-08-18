<?php
$players=getAllPlayers($bdd);
echo('<div class="mb-2">Il y a actuellement '.count($players).' joueur(s) dans l\'équipe</div>')
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Age</th>
            <th scope="col">Poste</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($players as $player){
            echo('
            <tr>
                <th scope="row">'.$player['id'].'</th>
                <td>'.$player['prenom'].'</td>
                <td>'.$player['nom'].'</td>
                <td>'.$player['age'].'</td>
                <td>'.$player['poste'].'</td>
                <td><a href="index.php?edit='.$player['id'].'" class="m-2"><img class="m-3" src="../public/img/icones/pencil.png" alt="Modifier ce joueur"></a><a href="index.php?del='.$player['id'].'"><img src="../public/img/icones/del.png" alt="supprimer ce joueur"></a></td>
            </tr>
            ');
        }
        ?>
    </tbody>
</table>