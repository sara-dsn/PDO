<?php 
session_start();

var_dump($_POST);
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
try {

    $db=new PDO('mysql:host=localhost;charset=utf8;dbname=record','admin','dosana');

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
$db->beginTransaction();
    // Prise en compte du fichier uploadé

    $title=$_POST["title"];
    var_dump($title);
    $artist=$_POST["artist"];
    $year=$_POST["year"];
    $genre=$_POST["genre"];
    $label=$_POST["label"];
    $price=$_POST["price"];
    
   
    echo"lalaligogmomohmhomhil";
    // $uploadFile = basename($_FILES['picture']['name']);

    // if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadFile)) {
        if(isset($_POST["envoyer"])){ 
        // Enregistrement des données dans la base
        $query = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) VALUES (:title, :year, :picture, :label, :genre, :price, :artist)");

        $query->bindValue(':title', $title);
        $query->bindValue(':year', $year);
        $query->bindValue(':picture', $_FILES['picture']['name']);
        $query->bindValue(':label', $label);
        $query->bindValue(':genre', $genre);
        $query->bindValue(':price', $price);
        $query->bindValue(':artist', $artist);

        $query->execute();

        echo "Reussi";
        header("Location: index.php?page=liste");
        exit;
    } else {
        echo "Erreur lors de l'upload du fichier.";
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}




?>