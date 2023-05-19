<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Top Objave</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Poslednje dodate objave.                      Nazad na početnu   ->                   
    <a class="navbar-brand" position="right" href="index.php">Nazad</a>

</h6>

</head>
<!---->
<?php include_once 'sveobjave.php';
		//include_once 'Objava.php';
   
	$nizTekstova = $redis->lRange('tekstoviLike', 0, 9);
	$nizZanrova = $redis->lRange('zanroviLike', 0, 9);
	$nizId = $redis->lRange('IdObjavaLike', 0, 9);
	$nizLike = $redis->lRange('brLajkova', 0, 9);
    if($_SESSION["postovi"] > 9){
      for($i=0; $i<10; $i++){

?> 
    <div>
    <strong class="d-block text-gray-dark">  
    <?php  //echo $_SESSION["postid"][$i]; echo "  -> "; echo $_SESSION["zanr"][$i]; echo $nizTekstova[$i]
			echo $nizId[$i]; echo " ->"; echo $nizZanrova[$i];
	?>
    </strong>
     <svg class="bd-placeholder-img mr-2 rounded" width="150" height="50"><rect fill="lightgreen" name="zaobradu" width="100%" height="100%" value="<?php echo $i;?>" /><text fill="#ffffff" dy=".1em" x="10%" y="50%">Objava: <?php echo $i;?> </text></svg>
    <svg class="bd-placeholder-img mr-2 rounded" width="150" height="50"><rect fill="lightgreen" name="zaobradu" width="100%" height="100%" value="<?php echo $i;?>" /><text fill="#ffffff" dy=".1em" x="10%" y="50%">Br. sviđanja: <?php echo $nizLike[$i] ?> </text></svg>
	<?php 
    //echo $postovi[$i];
	echo $nizTekstova[$i];
	
	?>
	<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-grey">
      </p>
 
 <?php 
  }
  }
  else{
	  echo "Trenutno ima manje od 10 objava, sve objave mozete videti na stranici Objave!";
  }
 
 ?>
 

      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-grey">
           
		


       
      </p>
    </div>
   

  
    <input type="button" class="btn btn-lg btn-primary btn-block" name="nazad" value="Nazad" onclick="window.location.href='index.php'" />

</html>
