
    <?php include 'header.php'; ?>
     <?php




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
