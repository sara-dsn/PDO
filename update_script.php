<?php 
session_start();

try 
{
    if(isset($_POST["id"])){ 

 // Connection :
    $db=new PDO('mysql:host=localhost;charset=utf8;dbname=record','admin','dosana');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Début de transaction :
    $db->beginTransaction();
  
// Récupération contenu objet à update :
    $id=$_POST["id"];
    $requete = $db->prepare("SELECT * FROM `disc` INNER JOIN `artist` ON `disc`.`artist_id` = `artist`.`artist_id` WHERE `disc_id`= $id");
    $requete->execute();

// transformation du contenu en objet (1 ligne = 1 objet):
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    
 // Récupération contenu des input par le 'name' :
   
    $title=$_POST["title"];
    $artist = $_POST["artist"];
    $year=$_POST["year"];
    $genre=$_POST["genre"];
    $label=$_POST["label"];
    $price = $_POST["price"];
    



//   Affichage contenu des  input :
  echo " <br><br> titre : $title <br><br>";
  echo " id : $id <br><br>";
  echo " genre : $genre <br><br>";
  echo " label :  $label <br><br>";
  echo " prix :  $price <br><br>";
  echo " année : $year<br><br>";
  echo " année : $artist<br><br>";

  
  $query = $db->prepare("UPDATE `disc` INNER JOIN  `artist` ON `disc`.`artist_id`=`artist`.`artist_id`   SET `disc`.`disc_title`=:title,`disc`.`disc_year`=:year,`disc`.`disc_picture`=:img,`disc`.`disc_label`=:label,`disc`.`disc_genre`=:genre,`disc`.`disc_price`=:price,`artist`.`artist_name`=:artist WHERE `disc`.`disc_id`=:id ");

// Si envoie fichier , mise à jour de l'image aussi :
  
if ( isset($_FILES["img"])){ 
       
        $img=$_FILES["img"]['name'];
        
        $query->bindValue(':img', $_FILES["img"]['name'], PDO::PARAM_STR);  
        echo " image : $img <br><br><br><br>";
     }
    //   Si il n'y a pas de fichier ,Requête mise à jour d'un objet :
else { 
    $img= $disc->disc_picture;
        echo"$img";
    $query->bindValue(':img', $img, PDO::PARAM_STR); 
};
 //  contenu FICHIER 
    echo"FILES:<br><br>";
    var_dump($_FILES);
    echo"<br><br>";

// Affichage contenue de ce qui est envoyé via le formulaire (par POST):
    echo"<br><br> POST :<br><br>";
    var_dump($_POST);
    echo"<br><br><br><br>";
 



    // Mise à jour valeurs objet avec valeurs input   :
    $query->bindValue(':title', $title, PDO::PARAM_STR);
    $query->bindValue(':year', $year, PDO::PARAM_INT);
    $query->bindValue(':label', $label, PDO::PARAM_STR);
    $query->bindValue(':genre', $genre, PDO::PARAM_STR);
    $query->bindValue(':price', $price, PDO::PARAM_STR);
    $query->bindValue(':artist', $artist, PDO::PARAM_INT);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    
// Execution et fin de transaction :
    $query->execute();
    $db->commit();
    echo "Reussi";

// Redirige vers page d'acceuil :
        header("Location: index.php?page=liste");
        exit;
    } 
    
    else {
        echo "Erreur lors de l'upload du fichier.";
    }
}
 catch (PDOException $e) {

    // Affichage du message d'erreur :
    echo 'Erreur de connexion : ' . $e->getMessage();
}
// echo"<br><br>Request:<br><br>";
// var_dump($_REQUEST);
// echo"<br><br>GET:<br><br>";
// var_dump($_GET);
// echo"<br><br>Get :<br><br>";
// var_dump($_GET);
// echo"<br><br><br><br>"; 
   // if ( isset($_REQUEST["img"])){ 
            
    //     $img = $_REQUEST["img"];
    //     $query = $db->prepare("UPDATE `disc` SET `artist_id`=:id,`disc_title`=:title,`disc_year`=:year,`disc_picture`=:img,`disc_label`=:label,`disc_genre`=:genre,`disc_price`=:price,`artist_id`=:id WHERE `artist_id`=:id ");
    //     $query->bindValue(':img', $img, PDO::PARAM_STR);  
    //     echo " img : $img<br><br>";
    // };
 // if ( isset($_REQUEST["img"])){ 
        
    //     $img=$_FILES["img"];
    //     $query = $db->prepare("UPDATE `disc` SET `artist_id`=:id,`disc_title`=:title,`disc_year`=:year,`disc_picture`=:img,`disc_label`=:label,`disc_genre`=:genre,`disc_price`=:price,`artist_id`=:id WHERE `artist_id`=:id ");
    //     $query->bindValue(':img', $_FILES['img']['name'], PDO::PARAM_STR);  
    //     echo " image : $img <br><br>";
    //  };


// Si envoie fichier, mise à jour de l'image aussi :
// if ($_FILES["img"]["error"] == UPLOAD_ERR_OK) {
//     $img = $_FILES["img"]["name"];
//     $query = $db->prepare("UPDATE `disc` SET `artist_id`=:id,`disc_title`=:title,`disc_year`=:year,`disc_picture`=:img,`disc_label`=:label,`disc_genre`=:genre,`disc_price`=:price,`artist_id`=:id WHERE `artist_id`=:id ");
//     $query->bindValue(':img', $img, PDO::PARAM_STR);
//     echo " image : $img <br><br>";
//     var_dump($_FILES);
// }
 // if (isset($_FILES['picture'])) {
    //     // Récupération du fichier téléchargé
    //     $uploadFile = $_FILES['picture']['name']; };
    //     var_dump($uploadFile);
  

    // $uploadFile = basename($_FILES['picture']['name']);

    // if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadFile)) {
      
        // Enregistrement des données dans la base 
              // $query->bindValue(':name', $name,PDO::PARAM_STR);
        // $query->bindValue(':id', $id,PDO::PARAM_STR);
        // $query->bindValue(':title', $title, PDO::PARAM_STR);
        // $query->bindValue(':year', $year,PDO::PARAM_INT);
        
        // $query->bindValue(':picture', $picture, PDO::PARAM_STR);
        // $query->bindValue(':label', $label, PDO::PARAM_STR);
        // $query->bindValue(':genre', $genre,PDO::PARAM_STR);
        // $query->bindValue(':price', $price, PDO::PARAM_INT);
        // $query->bindValue(':id', $id,PDO::PARAM_INT);
// echo"a";
// if(isset($_POST["envoyer"])){



// function t($title){
// $verif="/^[a-zA-Z]+$/";
// if(preg_match($verif,$title)){ 
// return true;
// }
// else {
//     return false;
// };
// };

// function y($year){
//     $verif="/^[0-9]+$/";
//     if(preg_match($verif,$year)){ 
// return true;
// }
// else{
//     return false;
// };
// };
// function g($genre){
//     $verif="/^[a-zA-Z]+$/";
//     if(preg_match($verif,$genre)){ 
// return true;
// }
// else{
//     return false;
// };
// };
// function l($label){
//     $verif="/^[a-zA-Z]+$/";
//     if(preg_match($verif,$label)){ 
// return true;
// }
// else{
//     return false;
// };
// };
// function pr($price){
//     $verif="/^[0-9]+$/";
//     if(preg_match($verif,$price)){ 
// return true;
// }
// else{
//     return false;
// };
// };

// if(t($title) && y($year) && g($genre)&& l($label) && pr($price) && isset($artist) && isset($picture)){
   
//     // $det = $db->prepare("INSERT INTO `disc`(`disc_id`, `disc_title`, `disc_year`, `disc_picture`, `disc_label`, `disc_genre`, `disc_price`, `artist_id`) VALUES (`$title`,`$year`,`$picture`,`$label`,`$genre`,`$price` ");
//     // $det->execute();
//     // echo"reussi";
//     // header("Location: index.php?page=liste");
//     // exit;
//     $det = $db->prepare("INSERT INTO `disc`(`disc_title`, `disc_year`, `disc_picture`, `disc_label`, `disc_genre`, `disc_price`, `artist_id`) VALUES (:title, :year, :picture, :label, :genre, :price, :artist)");

//     // Fix: Utilisez bindParam pour lier les valeurs et éviter les attaques par injection SQL
//     $det->bindParam(':title', $title, PDO::PARAM_STR);
//     $det->bindParam(':year', $year, PDO::PARAM_INT);
//     $det->bindParam(':picture', $picture, PDO::PARAM_STR);
//     $det->bindParam(':label', $label, PDO::PARAM_STR);
//     $det->bindParam(':genre', $genre, PDO::PARAM_STR);
//     $det->bindParam(':price', $price, PDO::PARAM_STR);
//     $det->bindParam(':artist', $artist, PDO::PARAM_INT);

//     $det->execute();

//     echo "reussi";
//     header("Location: index.php?page=liste");
//     exit;
  
// }else {
//     echo "Veuilllez remplir correctement ce formulaire s.v.p";
// // }

?>