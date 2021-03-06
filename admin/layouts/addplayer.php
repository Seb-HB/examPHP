
<div class="p-5">
    <?php
    include 'functions/check-datas.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $errors=checkPlayerValidity();
      if(count($errors) == 0){
        addPlayer($bdd, $_POST['prenom'], $_POST['nom'], $_POST['anniversaire'], $_POST['poste']);
      }
    }

    $players=getAllPlayers($bdd);
    if(count($players)>=23){
      $inputStatus='disabled="disabled"';
    }else{
      $inputStatus='required';
    }
    echo('<div>Il y a actuellement '.count($players).' joueur(s) dans l\'équipe</div>');
    if (count($players)>=23){
        echo('Vous ne pouvez plus ajouter de joueur, l\'équipe est au complet');
    }else{
        echo('Remplissez tout le formulaire pour en créer un nouveau.');
    }
    ?>
</div>
<div class="col-4 offset-4 my-3" >
    <form method="post" action="index.php?add=1">
      <div class="mb-3">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" class="form-control" id="prenom" name='prenom' <?php echo($inputStatus) ?>>
      </div>
      <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name='nom' <?php echo($inputStatus) ?>>
      </div>
      <div class="mb-3">
        <label for="anniversaire" class="form-label">Date de Naissance</label>
        <input type="date" class="form-control" id="anniversaire" name='anniversaire' <?php echo($inputStatus) ?>>
      </div>
      <div class="mb-3 form-check">
        <select class="form-select" aria-label="Default select example" name='poste' <?php echo($inputStatus) ?>>
            <option selected disabled>Choisir le poste</option>
            <option value="Gardien">Gardien</option>
            <option value="Défenseur">Défenseur</option>
            <option value="Milieu">Milieu</option>
            <option value="Attaquant">Attaquant</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" <?php echo($inputStatus) ?>>Ajouter à l'équipe</button>
    </form>
</div>