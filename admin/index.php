<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../global/css/bootstrap.min.css">
    <link rel="stylesheet" href="../global/css/style.css">
    <title>Admin</title>
</head>

<body>
    <?php
    session_start();
    include '../global/layouts/var.php';
    include '../global/functions/bdd.php';
    $bdd=connectBDD();

    // if (isset($_SESSION['user'])){
        if(isset($_GET['del'])){
            deletePlayer($bdd, $_GET['del']);
            $_SESSION['message']['statut']=1;
            $_SESSION['message']['text']='Joueur supprimé avec succes';
        }
        isset($_GET["add"])? $activeMenu=['', 'active']: $activeMenu=['active', ''];
        ?>
        <header class="mb-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="../public/img/FFF.png" alt="Logo FFF"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link <?php echo($activeMenu[0]) ?>" aria-current="page" href="index.php">Liste des joueurs</a>
                            <a class="nav-link <?php echo($activeMenu[1]) ?>" href="index.php?add=1">Ajouter un joueur</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <?php
            if (isset($_GET['add'])){
                include 'layouts/addplayer.php';
            }elseif(isset($_GET['edit'])){
                include 'layouts/edit-player.php';
            }else{
                include 'layouts/admin.php';
            }
            ?>
            <div class="col-2 offset-5 text-center">
                <?php
                if (isset($_SESSION['message'])){
                    ($_SESSION['message']['statut']==0)? $class='bg-danger': $class='bg-success';
                    echo('<p class="p-3 '.$class.'">'.$_SESSION['message']['text'].'</p>');
                    unset($_SESSION['message']);
                }
                ?>
            </div>
        </main>


        <?php
            include '../global/layouts/footer.php';
    // }else{
    //     var_dump($_SESSION);
    //     include 'layouts/login.php';
    // }
    ?>
</body>

</html>