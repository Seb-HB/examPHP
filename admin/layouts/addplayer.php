
<div class="p-5">
    <?php
    include 'functions/check-player-validity.php';
    $players=getAllPlayers($bdd);
    $staff=count($players);
    echo('<div>Il y a actuellement '.$staff.' joueur(s) dans l\'équipe</div>');
    if ($staff>=23){
        echo('Vous ne pouvez plus ajouter de joueur, l\'équipe est au complet');
    }else{
        echo('Remplissez tout le formulaire pour en créer un nouveau.');
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $errors=checkPlayerValidity();
        if(count($errors) == 0){
            addPlayer($bdd, $_POST['prenom'], $_POST['nom'], $_POST['anniversaire'], $_POST['poste']);
        }
    }
    ?>
</div>
<div class="col-4 offset-4 my-3" >
    <form method="post" action="index.php?add=1" <?php if ($staff>=23) echo('disabled') ?>>
      <div class="mb-3">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" class="form-control" id="prenom" name='prenom' required>
      </div>
      <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name='nom' required>
      </div>
      <div class="mb-3">
        <label for="anniversaire" class="form-label">Date de Naissance</label>
        <input type="date" class="form-control" id="anniversaire" name='anniversaire' required>
      </div>
      <div class="mb-3 form-check">
        <select class="form-select" aria-label="Default select example" name='poste' required>
            <option selected disabled>Choisir le poste</option>
            <option value="Gardien">Gardien</option>
            <option value="Défenseur">Défenseur</option>
            <option value="Milieu">Milieu</option>
            <option value="Attaquant">Attaquant</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Ajouter à l'équipe</button>
    </form>
</div>