<?php 
session_start();
echo"<br><br>Request:<br><br>";
var_dump($_REQUEST);
echo"<br><br>Post:<br><br>";
var_dump($_POST);
echo"<br><br>Get :<br><br>";
var_dump($_GET);
echo"<br><br><br><br>";
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
    if(isset($_GET["id"])){ 

echo"tryyyy";
    $db=new PDO('mysql:host=localhost;charset=utf8;dbname=record','admin','dosana');

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
$db->beginTransaction();
    // Prise en compte du fichier uploadé
    // $requete = $db->prepare("SELECT * FROM disc");
    // $requete->execute();
    // $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
  
    $id=$_GET["id"];
    $title=$_GET["title"];
    $nom = $_GET["artist"];
    $year=$_GET["year"];
    $picture=$_GET["picture"];
    // $picture=$_FILES['picture']['name'];
    $genre=$_GET["genre"];
    $label=$_GET["label"];
    $price = $_GET["price"];
  
    // if (isset($_FILES['picture'])) {
    //     // Récupération du fichier téléchargé
    //     $uploadFile = $_FILES['picture']['name']; };
    //     var_dump($uploadFile);
  

    // $uploadFile = basename($_FILES['picture']['name']);

    // if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadFile)) {
      
        // Enregistrement des données dans la base
        $query = $db->prepare("UPDATE `disc` SET `disc_id`=':id',`disc_title`=':title',`disc_year`=':year',`disc_picture`=':picture',`disc_label`='[value-5]',`disc_genre`=':genre',`disc_price`=':price',`artist_id`=':nom' ");
        
        $query->bindValue(':id', $id,PDO::PARAM_INT);
        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':year', $year,PDO::PARAM_INT);
        $query->bindValue(':picture', $_FILES['picture']['name'], PDO::PARAM_STR);
        $query->bindValue(':label', $label, PDO::PARAM_STR);
        $query->bindValue(':genre', $genre,PDO::PARAM_STR);
        $query->bindParam(':price', $price, PDO::PARAM_STR);
        // $query->bindValue(':price', $price);
        $query->bindValue(':nom', $nom,PDO::PARAM_STR);
        echo"<br>voici l'id: <br>";
        echo("->  ".$id."<br>");
    //         $query->bindParam(':title', $title, PDO::PARAM_STR);
    // $query->bindParam(':year', $year, PDO::PARAM_INT);
    // $query->bindParam(':picture', $picture, PDO::PARAM_STR);
    // $query->bindParam(':label', $label, PDO::PARAM_STR);
    // $query->bindParam(':genre', $genre, PDO::PARAM_STR);
    // $query->bindParam(':price', $price, PDO::PARAM_STR);
    // $query->bindParam(':artist', $artist, PDO::PARAM_INT);


        $query->execute();

        echo "Reussi";
        // header("Location: index.php?page=liste");
        // exit;
    } else {
        echo "Erreur lors de l'upload du fichier.";
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}




?>