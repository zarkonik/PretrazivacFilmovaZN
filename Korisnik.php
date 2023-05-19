<?php
require_once 'vendor/autoload.php';
include_once 'Login.php';

use GraphAware\Neo4j\Client\ClientBuilder;

 $client = ClientBuilder::create()
	    //->addConnection('default', 'http://neo4j:graph123@localhost') // Example for HTTP connection configuration (port is optional)
	    ->addConnection('bolt', 'bolt://neo4j:graph123@localhost') // Example for BOLT connection configuration (port is optional)
		 ->build();


$result = $client->run('MATCH (u:User {name:{user}}) return u, u.name as name, u.brpostova as brpostova,  u.komentari as brkom', ['user' => $_SESSION['username']]);
$record = $result->getRecord();

?>

<!DOCTYPE HTML>
<html>
<head id="head">
<link rel="stylesheet" href ="stil.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


<title>Korisnik</title>


</head>
<body>



<h2 class="alert alert-primary">Podaci o korisniku:</h2>



<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-grey">
      </p>
  <div class="row mb-3">
    <div class="alert alert-warning">Korisničko ime:</div>
    <div class="alert alert-light">                          </div>
    <div class="alert alert-danger"><?php echo $record->value('name'); ?></div>
  </div>
  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-grey">
      </p>
      <div class="row mb-3">
    <div class="alert alert-warning">Broj objava:</div>
    <div class="alert alert-light">                          </div>
    <div class="alert alert-danger"><?php echo $record->value('brpostova'); ?></div>
  </div>
  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-grey">
      </p>

  <div class="row mb-3">
    <div class="alert alert-warning">Broj komentara:</div>
    <div class="alert alert-light">                          </div>
    <div class="alert alert-danger"><?php echo $record->value('brkom'); ?></div>
  </div>

  
  <input type="button" class="btn btn-lg btn-info" name="nazad" value="Nazad" onclick="window.location.href='index.php'" />

</body>
</html>