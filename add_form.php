<?php 
 
// Connexion à la base de données
$db=new PDO('mysql:host=localhost;charset=utf8;dbname=record','admin','dosana');
// configurer le mode erreur PDO pour générer des exceptions :
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $requete = $db->prepare("SELECT * FROM artist");
  $requete->execute();
  $tableau = $requete->fetchAll(PDO::FETCH_OBJ);


?>


<div class="text-center  " ><h1  class="font-weight-bold">Ajouter un vinyle</h1> </div>
    <div class="col-8 d-flex justify-content-center ">


       
        <form action="add_script.php" method="post" enctype="multipart/form-data" class="w-100 mt-4">
            <div class="form-group w-100 row">
                <div class="col-6">
                    <label for="title"  ><h5>Title</h5></label><br>
                    <input name="title" class=" form-control" type="text"  placeholder="Enter Title"><br>
                </div>
                <div class="col-6">
                    <label for="artist"><h5>Artist</h5></label><br>
                    <select name="artist" class="col-12"  size="1">
                    <option   id="0">Veuillez choisir un artiste</option>
                    <?php foreach($tableau as $artist){ ?>
                        <option value="<?=$artist->artist_id?>" id="<?=$artist->artist_id?>"><?=$artist->artist_name?></option>
                    <?php };?>
                    </select>
                </div>
            </div>
            <div class="form-group w-100 row">
                <div class="col-6">
                    <label for="year"><h5>Year</h5></label><br>
                    <input name="year" class=" form-control" type="text"  placeholder="Enter Year"><br>
                </div>
                <div class="col-6">
                    <label for="genre"  ><h5>Genre</h5></label><br>
                    <input name="genre" class=" form-control" type="text"  placeholder="Enter genre (Rock, Pop, Prog ...)"><br>
                </div>
            </div>
            <div class="form-groupw-100 row">
                <div class="col-6">
                    <label for="label"><h5>Label</h5></label><br>
                    <input name="label" class=" form-control" type="text"   placeholder=" Enter Lable(EMI, Warner, PolyGram, Univers sale ...)"><br>
                </div>
                <div class="col-6 mb-4">
                    <label for="price"><h5>Price</h5></label><br>
                    <input name="price" class=" form-control" type="text" ><br>
                </div>
            </div>
            <div class="form-groupw-100 row">
                <div class="col-12">
                    <label type="picture" class="mr-4" ><h5>Picture</h5></label>
                    <input name="picture" type="file" class="col-11 mb-4"><br>
                </div>
            </div>
            <div class="row w-100 d-flex justify-content-center">
                <input type="submit" name="envoyer" href="add_script.php"  class="btn mr-4 rounded btn-dark text-light " value="Envoyer">
                <input value="Retour" type="submit" href="index.php?page=liste" class="btn ml-4 rounded btn-dark text-light ">
            </div>
        </form>
    </div>
</div>
