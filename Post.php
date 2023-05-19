<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Objave korisnika</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h4 class="border-bottom border-gray pb-2 mb-0">Objave korisnika: <?php include_once 'Login.php'; 
    echo $_SESSION["username"];

?></h4>


<!---->
<?php include_once 'postovi.php';
      
   
    if(isset($_SESSION["brpostova"])){
      for($i=0; $i<$_SESSION["brpostova"]; $i++){
?> 
    <div>
    <strong class="d-block text-gray-dark">  
    <?php  echo "Objava broj: " .substr($_SESSION["postid"][$i], -1) . " ->  Žanr: ".$_SESSION["zanr"][$i]; ?>
    </strong>
      <svg class="bd-placeholder-img mr-2 rounded" width="50" height="50" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect fill="#007bff" width="100%" height="100%"/><text fill="#007bff" dy=".3em" x="50%" y="50%">32x32</text></svg>
    <?php 
    echo $postovi[$i];
   }
  }
   else{ 
   echo "Nemate nijednu objavu";}
?>
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-grey">

      </p>
    </div>
   

  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h4 class="border-bottom border-gray pb-2 mb-0">Komentari<h6>->ID objave počinje imenom korisnika i završava se brojem objave<-</h6></h4>
    <?php 
          if(isset($_SESSION["brpostova"])){
            for($i=0; $i<$_SESSION["brpostova"]; $i++){
              if(isset($_SESSION["pbrkom"][$i])){
              for($j=0; $j< $_SESSION["pbrkom"][$i]; $j++){
                if(isset($komentari[$i][$j])) {
                  ?>
    <div class="media text-muted pt-3">
      <div>
        <div>
          <strong class="text-gray-dark"><?php
                echo  $komentari[$i][$j];
                
          ?></strong> 
          <span class="d-block"><?php echo "Komentar na objavu sa ID-jem: ". $postovid[$i]?></span>
        </div>
        <?php
        }
		
      }
	  
    }
	else{
    echo "Nemate ni jedan komentar na postojećim objavama";
  }
  }
}
  
      ?>
      </div>
     
    </div>
    <input type="button" class="btn btn-lg btn-primary btn-block" name="nazad" value="Nazad" onclick="window.location.href='index.php'" />

</html>

