<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Objave</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Objave svih korisnika.                      Nazad na početnu   ->                   
    <a class="navbar-brand" position="right" href="index.php">Nazad</a>

</h6>
</head>

<!---->

<?php include_once 'sveobjave.php';
   
   
    if($_SESSION["postovi"] > 0){
      for($i=0; $i<$_SESSION["postovi"]; $i++){

?> 
    <form action="coment.php" method="post" >
    <div>
    <strong class="d-block text-gray-dark">  
    <?php  echo "ID Objave: ".$_SESSION["postid"][$i]."  -> Žanr: ".$_SESSION["zanr"][$i]; ?>
    </strong>
     <svg class="bd-placeholder-img mr-2 rounded" width="150" height="50"><rect fill="lightgreen" name="zaobradu" width="100%" height="100%" value="<?php echo $i;?>" /><text fill="#ffffff" dy=".1em" x="10%" y="50%">Objava: <?php echo $i;?></text></svg>
    <?php 
    echo $postovi[$i];
    ?>
 

  
    <button class="btn btn-lg btn-success btn-block" type="submit" name="obradi" value="<?php echo $i;?>" >Dodaj komentar/sviđanje</button>
 <?php  }
  }
   
?>
</form>
 
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-grey">    
      </p>
    </div>

    <input type="button" class="btn btn-lg btn-primary btn-block" name="nazad" value="Nazad" onclick="window.location.href='index.php'" />

</html>

