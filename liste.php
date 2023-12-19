<?php 
   
   // Connexion à la base de données
   $db=new PDO('mysql:host=localhost;charset=utf8;dbname=record','admin','dosana');
   // configurer le mode erreur PDO pour générer des exceptions :
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "<p class='alert alert-success '>Vous etes conectée avec succès à la base de données<p>";

   // // Vérifier la présence du paramètre "disc_id"
   // if (isset($_GET["disc_id"])) {
   //     echo "ça existe";

  // Exécution d'une requête SQL
  $requete = $db->prepare("SELECT * FROM disc");
  $requete->execute();
  $tableau = $requete->fetchAll(PDO::FETCH_OBJ);


  
  
   // }
 
?>
    <h1 class="font-weight-bold text-center">Liste des disques</h1>
    <div class="d-flex justify-content-center ">
    <div class="row col-8  "> 
    <?php
if ($tableau){ 
    foreach ($tableau as $disc){ 
    ?>
<div class="card col-3 mr-4 ml-4 mb-4" style="width: 18rem;">
  <img class="card-img-top" src="img/<?=$disc->disc_picture?>" alt="vinyle">
  <div class="card-body">
    <h5 class="card-title font-weight-bold"><?= $disc->disc_title ?></h5>
    <p class="card-text">Label : <?= $disc->disc_label?> <br>
    Year :<?= $disc->disc_year?> <br>
    Genre : <?=$disc->disc_genre?></p>
    <a href="index.php?page=details&id=<?=$disc->disc_id?>" class="btn btn-dark text-ligth">Détails</a>
  </div>
</div>

<?php };} 
else{
    echo "<br>  La page ne répond pas ";
};?>
</div>
</div>
