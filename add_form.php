


<div class="text-center  " ><h1  class="font-weight-bold">Ajouter un vinyle</h1> </div>
<div class=" d-flex justify-content-center ">
    <div class="col-8">
<form action="add_script.php" methode="POST" class="w-100 mt-4">
    <div class="form-groupw-100 row">
        <div class="col-6">
        <label for="title"  ><h5>Title</h5></label><br>
        <input class=" form-control" type="text" class="w-75" placeholder="Enter Title"><br>
        </div>
        <div class="col-6">
        <label for="artist"><h5>Artist</h5></label><br>
        <select class=" form-control" name="1" class="w-75" id="1"></select>
        </div>
    </div>
    <div class="form-group w-100 row">
    <div class="col-6">
        <label for="year"><h5>Year</h5></label><br>
        <input class=" form-control" type="text" class="w-75"  placeholder="Enter Year"><br>
        </div>
        <div class="col-6">
        <label for="genre"  ><h5>Genre</h5></label><br>
        <input class=" form-control" type="text" class="w-75" placeholder="Enter genre (Rock, Pop, Prog ...)"><br>
        </div>
    </div>
    <div class="form-groupw-100 row">
    <div class="col-6">
        <label for="label"><h5>Label</h5></label><br>
        <input class=" form-control" type="text" class="w-75"  placeholder=" Enter Lable(EMI, Warner, PolyGram, Univers sale ...)"><br>
        </div>
        <div class="col-6 mb-4">
        <label for="price"><h5>Price</h5></label><br>
        <input class=" form-control" type="text" class="w-75"><br>
        </div>
    </div>
    <div class="form-groupw-100 row">
    <div class="col-12">
        <label type="picture" class="mr-4" ><h5>Picture</h5></label>
        <input  type="file" class="w-75 mb-4"><br>
        </div>

</div>
    <div class="row w-100 d-flex justify-content-center">
        <button type="submit" class="btn mr-4 rounded btn-dark text-light " >Ajouter</button>
        <button type="delete" class="btn ml-4 rounded btn-dark text-light ">Retour</button>
    </div>
</form>
</div>
</div>
