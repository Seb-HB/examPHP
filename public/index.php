<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../global/css/bootstrap.min.css">
    <link rel="stylesheet" href="../global/css/style.css">
    <link rel="stylesheet" href="css/public.css">
    <title>Accueil</title>
</head>
<body>
    <?php
    session_start();
    include '../global/layouts/var.php';
    include '../global/functions/bdd.php';
    $bdd=connectBDD();
    ?>
    <header>
        <div class="container">
            <img src="img/FFF.png" alt="Logo FFF">
        </div>
    </header>
    <main>
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
                    </tr>
                    ');
                }
                ?>
            </tbody>
        </table>

    </main>
    <?php
        include '../global/layouts/footer.php';
    ?>
    
</body>
</html>