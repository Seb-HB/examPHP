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
    </main>
    <?php
        include '../global/layouts/footer.php';
    ?>
    
</body>
</html>