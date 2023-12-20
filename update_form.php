
<?php 

$id=$_GET['id'];
  $det = $db->prepare("SELECT * FROM disc INNER JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id= $id ");
  $det->execute();
  $detail = $det->fetchAll(PDO::FETCH_OBJ);

?>

<div class="text-center  " ><h1  class="font-weight-bold">Modifier un vinyle</h1> </div>
<div class=" d-flex justify-content-center ">
    <div class="col-8">
<form action="add_script.php" methode="POST" class="w-100 mt-4">
    <div class="form-group w-100">
        <div class="col-12">
            <?php  foreach($detail as $disc){ ?>
        <label for="title"  ><h5>Title</h5></label><br>
        <input class=" form-control" type="text" class="w-75" value="<?=$disc->disc_title?>"><br>
        </div>
        <div class="col-12">
        <label for="artist"><h5>Artist</h5></label><br>
        <input class=" form-control" value="<?=$disc->artist_name?>" class="w-75" ></input>
        </div>
    </div>
    <div class="form-group  w-100">
    <div class="col-12">
        <label for="year"><h5>Year</h5></label><br>
        <input class=" form-control" type="text" class="w-75"  value="<?=$disc->disc_year?>"><br>
        </div>
        <div class="col-12">
        <label for="genre"  ><h5>Genre</h5></label><br>
        <input class=" form-control" type="text" class="w-75" value="<?=$disc->disc_genre?>"><br>
        </div>
    </div>
    <div class="form-group w-100">
    <div class="col-12">
        <label for="label"><h5>Label</h5></label><br>
        <input class=" form-control" type="text" class="w-75"  value="<?=$disc->disc_label?>"><br>
        </div>
        <div class="col-12 mb-4">
        <label for="price"><h5>Price</h5></label><br>
        <input class=" form-control" type="text" value="<?=$disc->disc_price?>"class="w-75"><br>
        </div>
    </div>
    <div class="form-group w-100">
    <div class="col-12">
        <label type="picture" class="mr-4" ><h5>Picture</h5></label>
        <input  type="file" class="w-75 mb-4"><br>
        <img src="img/<?=$disc->disc_picture?>" alt="<?=$disc->disc_title?>">
        </div>

</div>
<?php };?>
    <div class="row w-100 d-flex justify-content-center mb-4">
        <button type="submit"  href="index.php?page=add_script&id=<?=$disc->disc_id?>" class="mr-4 rounded btn-dark text-light btn " >Ajouter</button>
        <button type="submit" href="index.php?page=liste" class="ml-4 rounded btn-dark text-light btn">Retour</button>
    </div>
</form>
</div>
</div>
