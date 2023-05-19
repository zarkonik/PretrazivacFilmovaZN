<!DOCTYPE HTML>
<html>
<head id="head">
<link rel="stylesheet" href ="stil.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


<title>Lako do filma</title>


</head>
<body>
       
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php">Pretraživač</a>
                <a class="navbar-brand" href="index.php">Početna</a>
                <a class="navbar-brand" href="sve.php">Objave</a>
                <a class="navbar-brand" href="vreme.php">Najskorije objave</a>
                <a class="navbar-brand" href="like.php">Top objave</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
     
                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                  <ul class="navbar-nav mr-auto">          
                  </ul>
                  <form class="form-inline my-2 my-lg-0" >
                    <label class="navbar-brand">Trenutni korisnik: <?php 
                    include_once 'Login.php';
                    if(isset($_SESSION["username"]))
                    echo $_SESSION["username"];
                    
                    else    
                    echo " ";
                    

                    ?> </label>
                   <label class="navbar-brand"></label>
                    
                  </form>
                </div>
              </nav> 

              <div class="nav-scroller bg-white shadow-sm">
        <nav class="nav nav-underline">
        
        <a class="nav-link" href="Korisnik.php">
             Korisnik:
        <span class="badge badge-pill bg-light align-text-bottom"><?php 
                    include_once 'Login.php';
                    if(isset($_SESSION["username"]))
                    echo $_SESSION["username"];
                    
                    else    
                    echo " ";
                    ?></span>
    </a>
    <a class="nav-link active" href="Post.php">Objave</a>
  </nav>
</div>



<main role="main">
<div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Dobrodošli na sajt za pretragu filmova
      <img src="slike/zone-film.png" />
      </h1>
      <p>Na našoj stranici možete objaviti opis filma, koji će pomoći drugim korisnicima da vam odgovore nazivom filma koji tražite.</p>
      <p><a class="btn btn-primary btn-lg" href="login.html" role="button">Uloguj se &raquo;</a><a class="btn btn-primary btn-lg" href="register.html" role="button">Kreiraj nalog &raquo;</a></p>
      <p>Pored sospstvenih objava, postoji i mogućnost praćenja objava drugih korisnika kao i mogućnost komentarisanja nečije objave.</p>
    </div>
  </div>


</div>

<div class="container"> 
<div class="row">
      <div class="col-md-4">   
        <h2>Unesite opis filma:</h2>
        <form action="Objava.php" method="post">
        <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Opis filma:</span>
  </div>
  <textarea class="form-control" name="tekst" class="pretraga " placeholder="Opis" aria-label="With textarea"></textarea>
</div>
        
        
        <img src ="slike/search.jpg" />  
        
  </div> 
  
  <div class="col-md-4"> 
  <h2>Žanr</h2>
  <input type="radio" name="gender" value="akcija" checked> Akcija<br>
  <input type="radio" name="gender" value="drama"> Drama<br>
  <input type="radio" name="gender" value="komedija"> Komedija<br>
  <input type="radio" name="gender" value="horor"> Horor<br>
  <input type="radio" name="gender" value="naučna fantastika"> Naučna fantastika<br>
  <input type="radio" name="gender" value="sport"> Sport<br>
  <input type="radio" name="gender" value="dokumentarni"> Dokumentarni<br>
  <input type="radio" name="gender" value="triler"> Triler  
   
  </div>
 
  <div class="col-md-4"> 
  
  <img src="slike/xenforo-logo.png" />
  <input  class="btn btn-primary btn-lg active" type="submit" value="Prosledi" /> 
  </div>
  </div>
  </form>
  <div class="container"> 
    <h2>Informacije o postojećim objavama:</h2>
    <a role="button"  class="btn btn-secondary"  href="Post.php">Pogledaj objave</a> 
  </div>
  
</div>
</main>
<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Pronađite željeni film uz pomoć drugih korisnika lako i uz kratak opis.</span>
    <img src="slike/plako.jpg" />
  </div>
</footer>


</body>


</html>