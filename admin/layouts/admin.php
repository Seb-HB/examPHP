<?php
$players=getAllPlayers($bdd);
echo('<div>Il y a actuellement '.count($players).' joueur(s) dans l\'équipe</div>')
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Date de naissance</th>
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
                <td>'.$player['date_daissance'].'</td>
                <td>'.$player['poste'].'</td>
                <td><a href="">Editer</a><a href="">Supprimer</a></td>
            </tr>
            ');
        }
        ?>
    </tbody>
</table>