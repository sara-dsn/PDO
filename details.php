
<?php 

$id=$_GET['id'];
  $det = $db->prepare("SELECT * FROM disc INNER JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id= $id ");
  $det->execute();
  $detail = $det->fetchAll(PDO::FETCH_OBJ);

 
?>
<h1 class="font-weight-bold text-center" >Détails</h1>
<div class="d-flex justify-content-center">
    <div class="col-8 mt-4 ">
        <form action="#" methode="GET">
            <?php foreach($detail as $disc){ ?>
            <div class="form-group row">
                <div class="col-6">
                <label class="text-top" for="title"><h5>Title</h5></label>
                <input class=" form-control" type="text" value="<?=$disc->disc_title?>" name="title">
                </div>
                <div class="col-6 ">
                <label for="artist"><h5>Artist</h5></label>
                <input class=" form-control" type="text" value="<?=$disc->artist_name?>" name="artist">
                </div>
            </div>
           
            <div class="form-group row">
            <div class="col-6">
                <label for="year"><h5>Year</h5></label>
                <input class=" form-control" type="text" value="<?=$disc->disc_year?>" name="year">
                </div>
                <div class="col-6">
                <label for="genre"><h5>Genre</h5></label>
                <input class=" form-control" type="text" value="<?=$disc->disc_genre?>" name="genre">
                </div>
</div>
            <div class="form-group row">
            <div class="col-6">
                <label for="label"><h5>Label</h5></label>
                <input class=" form-control" type="text" value="<?=$disc->disc_label?>" name="label">
                </div>
                <div class="col-6">
                <label for="price"><h5>Price</h5></label>
                <input class="form-control" type="text" value="<?=$disc->disc_price?>" name="price">
                </div>
            </div>
            <div class="col-6">
                <label for="picture"><h5>Picture</h5></label>
            <div class="col-9 mb-4">
            <img src="img/<?=$disc->disc_picture?>" alt="<?=$disc->disc_title?>" class="img-fluid rounded">
            </div>
            </div> <?php }; ?>
            <div class="form-group row">
                <a type="submit" class="ml-2 btn btn-dark text-light rounded" href="index.php?page=update_form&id=<?=$disc->disc_id?>">Modifier</a>
              <a type="submit"class="ml-2 btn btn-dark text-light rounded" href="index.php?page=delete_form&id=<?=$disc->disc_id?>" >Supprimer </a>
                <a type="submit"  class="ml-2 btn btn-dark text-light rounded" href="index.php?page=liste">Retour</a>
            
            </div>
        </form>
    </div>
</div>
