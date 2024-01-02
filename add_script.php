<?php 
session_start();

var_dump($_POST);

try {
    if(isset($_POST["envoyer"])){ 

    $db=new PDO('mysql:host=localhost;charset=utf8;dbname=record','admin','dosana');

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
$db->beginTransaction();
    // Prise en compte du fichier uploadé
    $requete = $db->prepare("SELECT * FROM disc");
    $requete->execute();
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
  

    $title=$_POST["title"];
    $id = intval($_POST["artist"]);
    $genre=$_POST["genre"];
    $label=$_POST["label"];
    $price = intval($_POST["price"]);
    $year=intval($_POST["year"]);
    $date= new DateTime("$year-01-01");
    $picture=$_FILES['picture']['name'];
   
  echo " <br><br> titre : $title <br><br>";
  echo " id : $id <br><br>";
  echo " genre : $genre <br><br>";
  echo " label :  $label <br><br>";
  echo " prix :  $price <br><br>";
  echo " année : $year<br><br>";
  echo " image : $picture <br><br>";

  $query = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) VALUES (:title, :year, :picture, :label, :genre, :price, :id)");

        $query->bindValue(':title', $title, PDO::PARAM_STR);
        $query->bindValue(':year', $year,PDO::PARAM_INT);
        $query->bindValue(':picture', $_FILES['picture']['name'], PDO::PARAM_STR);
        $query->bindValue(':label', $label, PDO::PARAM_STR);
        $query->bindValue(':genre', $genre,PDO::PARAM_STR);
        $query->bindValue(':price', $price, PDO::PARAM_INT);
        $query->bindValue(':id', $id,PDO::PARAM_INT);

        $query->execute();
$db->commit();
        echo "Reussi";
        header("Location: index.php?page=liste");
        exit;
    } else {
        echo "Erreur lors de l'upload du fichier.";
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
};

        // $query->bindValue(':price', $price);

    //         $query->bindParam(':title', $title, PDO::PARAM_STR);
    // $query->bindParam(':year', $year, PDO::PARAM_INT);
    // $query->bindParam(':picture', $picture, PDO::PARAM_STR);
    // $query->bindParam(':label', $label, PDO::PARAM_STR);
    // $query->bindParam(':genre', $genre, PDO::PARAM_STR);
    // $query->bindParam(':price', $price, PDO::PARAM_STR);
    // $query->bindParam(':artist', $artist, PDO::PARAM_INT);

?>