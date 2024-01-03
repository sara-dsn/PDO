<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
  <div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="index.php?page=liste">Record</a>
  
 
  </div>
</nav>
   <?php
try {
       // Connexion à la base de données
       $db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'dosana');
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
       // Exécution d'une requête SQL
       $requete = $db->query("SELECT * FROM artist");
       $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
       $requete->closeCursor();
   
     
   } catch (PDOException $e) {
       echo "Erreur PDO : " . $e->getMessage() . "<br>";
       echo "Code d'erreur PDO : " . $e->getCode() . "<br>";
       die("Fin du script");
   } catch (Exception $e) {
       echo "Erreur générale : " . $e->getMessage() . "<br>";
       echo "Code d'erreur : " . $e->getCode() . "<br>";
       die("Fin du script");
   }
   ?>
   

