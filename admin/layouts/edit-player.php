<div class="p-5">
    <h1>Modification d'un joueur</h1>
    <?php
    include 'functions/check-datas.php';
  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $errors=checkPlayerValidity();
      if(count($errors) == 0){
        editPlayer($bdd,$_POST['id'],$_POST['prenom'], $_POST['nom'], $_POST['anniversaire'], $_POST['poste']);
      }
    }

    $player=getPlayer($bdd, $_GET['edit']);
    
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
    <form method="post" action="index.php?edit=<?php  echo($player['id'])?>">
      <div class="mb-3" hidden>
        <input type="text" class="form-control"  name='id' required value= <?php  echo($player['id'])?>>
      </div>
      <div class="mb-3">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" class="form-control" id="prenom" name='prenom' required value= <?php  echo($player['prenom'])?>>
      </div>
      <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name='nom' required value= <?php  echo($player['nom'])?>>
      </div>
      <div class="mb-3">
        <label for="anniversaire" class="form-label">Date de Naissance</label>
        <input type="date" class="form-control" id="anniversaire" name='anniversaire' required value= <?php  echo($player['date_daissance'])?>>
      </div>
      <div class="mb-3 form-check">
        <select class="form-select" aria-label="Default select example" name='poste' required value= <?php  echo($player['poste'])?>>
            <option selected disabled>Choisir le poste</option>
            <option value="Gardien">Gardien</option>
            <option value="Défenseur">Défenseur</option>
            <option value="Milieu">Milieu</option>
            <option value="Attaquant">Attaquant</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>