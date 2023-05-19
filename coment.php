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
<?php   include_once 'postovi.php';
        include_once 'sveobjave.php';
        $prom = $_POST['obradi'];        
?> 

<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Dodajte komentar na objavu korisnika: 
    <?php  $korisnik = $_SESSION["postid"][$prom]; echo substr($korisnik, 0, -2);?>
</h6>


<!---->
<form action="Komentar.php" method="post">
    <div>
    <strong class="d-block text-gray-dark">  
    <?php  echo "ID objave: ".$_SESSION["postid"][$prom] ." ->  Selektovani žanr: " .$_SESSION["zanr"][$prom]; ?>
    <input type="hidden" name="hpid" value="<?php echo $_SESSION["postid"][$prom] ?>"/>
    </strong>
      <svg class="bd-placeholder-img mr-2 rounded" width="50" height="50" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect fill="#007bff" width="100%" height="100%"/><text fill="#007bff" dy=".3em" x="50%" y="50%">32x32</text></svg>
    <?php 
   if(isset($_POST['obradi']))
    echo $postovi[$prom]; 
?>
    </div>
    
    
  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Dodaj komentar</h6>
    <div class="media text-muted pt-3">
        <span class="d-block"><?php include_once 'Login.php'; 
    echo "Trenutni korisnik: @". $_SESSION["username"];?></span>
      </div>
      <label>Unesite zeljeni komentar:</label>
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">-></span>
  </div>
  <input type="text" class="form-control"  name="koment"aria-label="Amount (to the nearest dollar)">
  <div class="input-group-append">
    <span class="input-group-text">:)</span>
  </div>
</div>
    </div>
    <input type="submit" name="svidjanja" class="btn btn-info" value="Sviđa mi se" />
    <input type="submit" name="komentar"class="btn btn-info" value="Postavi komentar" />
    
    <input type="button" class="btn btn-info " name="nazad" value="Nazad" onclick="window.location.href='sve.php'" />
   </form>
</html>

