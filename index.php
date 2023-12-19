
    <?php include 'header.php'; ?>
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
   
   if(!isset($_GET['page'])|| empty($_GET['page'])||$_GET['page']=='liste'){
    include_once('liste.php');
   } else if (($_GET['page'])=='details'){
    include('details.php');
   }else if(($_GET['page'])=='add_form'){
    include('add_form.php');
   }else if(($_GET['page'])=='update_form'){
    include('update_form.php');
   } else if(($_GET['page']=='delete_form')){
    include('delete_form.php');
   };
    ?>

<?php include 'footer.php' ?>
