<?php 
include "header.php";
session_start();


// echo' <div class="container-fluid mt-4"><div class="d-flex justify-content-center mt-4">
// <div class="col-5">
// <form action="delete_script.php" method="post">
// <div name="id" value="3" class="card text-white bg-danger mt-4">
// <div class="card-body">
// <h5 class="card-title">Êtes-vous sûr de vouloir supprimer ce vinyle?</h5>

// <div class="row">
//     <input  class="mr-2 btn btn-rounded  btn-dark text-light" type="submit" name="supp" href="delete_script.php" value="Oui">
//     <input class=" btn btn-rounded btn-dark text-light" type="submit" href="index.php?page=liste" value="Non">
// </div></form></div>
// </div></div>
// </div></div>';

try {
    if(isset($_GET["supprimer"])){ 

    $db=new PDO('mysql:host=localhost;charset=utf8;dbname=record','admin','dosana');

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
$db->beginTransaction();
  
$requete = $db->prepare("SELECT * FROM disc");
$requete->execute();
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);


    $id = $_GET["supprimer"];
    
    $query = $db->prepare("DELETE FROM `disc` WHERE `disc_id`= :id");
    $query->bindValue(':id' , $id, PDO::PARAM_INT);
  $query->execute();

  $db->commit();


  
        

        echo"<br>voici l'id: <br>";
        echo("->  ".$id."<br>");

      

        echo "Reussi";
        header("Location: index.php?page=liste");
        exit;
    } else {
        echo "Erreur ";
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}



include "footer.php";
?>