<?php 

$id=$_GET['id'];
  $det = $db->prepare("SELECT * FROM disc INNER JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id= $id ");
  $det->execute();
  $detail = $det->fetchAll(PDO::FETCH_OBJ);

?>


<div class="text-center  " ><h1 class="font-weight-bold">Supprimer un vinyle</h1> </div>
<div class=" d-flex justify-content-center ">
    <div class="col-8">
<form action="delete_script.php" methode="GET" class="w-100 mt-4">
    <div class="form-group w-100">
        <div class="col-12">
        <?php
    foreach ($detail as $disc){ 
    ?>
        <label for="title"  ><h5>Title</h5></label><br>
        <input class=" form-control" type="text" class="w-75" value="<?= $disc->disc_title?> "><br>
        </div>
        <div class="col-12">
        <label for="artist"><h5>Artist</h5></label><br>
        <input class=" form-control"  class="w-75" value="<?= $disc->artist_id?> "></input>
        </div>
    </div>
    <div class="form-group  w-100">
    <div class="col-12">
        <label for="year"><h5>Year</h5></label><br>
        <input class=" form-control" type="text" class="w-75"  value="<?= $disc->disc_year?> "><br>
        </div>
        <div class="col-12">
        <label for="genre"  ><h5>Genre</h5></label><br>
        <input class=" form-control" type="text" class="w-75" value="<?= $disc->disc_genre?> "><br>
        </div>
    </div>
    <div class="form-group w-100">
    <div class="col-12">
        <label for="label"><h5>Label</h5></label><br>
        <input class=" form-control" type="text" class="w-75"  value="<?= $disc->disc_label?> "><br>
        </div>
        <div class="col-12 mb-4">
        <label for="price"><h5>Price</h5></label><br>
        <input class=" form-control" type="text" value="<?= $disc->disc_price?> "class="w-75"><br>
        </div>
    </div>
   
    <div class="col-12 form-group w-100">
        <label type="picture" class="mr-4" ><h5>Picture</h5></label>
    
        <div class="col-4 mb-4">
            <img src="img/<?=$disc->disc_picture?>" alt="<?=$disc->disc_title?>" class="img-fluid rounded">
        </div>
       
        

    </div>
<?php }; ?>
    <div class="row w-100 d-flex justify-content-center">
    <button type="submit"class="ml-2 btn btn-dark text-light rounded" value="<?=$disc->disc_id?>" name="supprimer"  href="delete_script.php?&id=<?=$disc->disc_id?>"> Supprimer</button>
        <input type="submit" href="index.php?page=liste" class="btn ml-4 rounded btn-dark text-light " value="Retour">
    </div>
</form>
</div>
</div>
