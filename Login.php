<?php

require_once 'vendor/autoload.php';


use GraphAware\Neo4j\Client\ClientBuilder;

$client = ClientBuilder::create()
    //->addConnection('default', 'http://neo4j:graph123@localhost') // Example for HTTP connection configuration (port is optional)
    ->addConnection('bolt', 'bolt://neo4j:graph123@localhost') // Example for BOLT connection configuration (port is optional)
    ->build();
	session_start();
	$logged = false;
	$postoji = false;
	if(isset($_POST['username']) && isset($_POST['password']) ){
		$result = $client->run('MATCH (u:User) return u, u.name as name, u.password as password, u.brpostova as brpostova');
		$records = $result->getRecords();
		foreach($records as $record){
			if($record->value('name') == $_POST['username'] && $record->value('password') == $_POST['password'])
			 	$postoji = true;	
		}
		if($_POST['username'] != "" && $_POST['username'] != NULL && $_POST['password'] != "" && $_POST['password'] != NULL && $postoji == true && $logged == false){
			$_SESSION["username"]=$_POST["username"];
			$_SESSION["password"]=$_POST["password"];
			$logged = true;
			echo "Logovanje uspesno, trenutni korisnik: " . $_SESSION["username"];
			echo "<a href='index.php'>Nazad</a>";
			}
			else{
				echo "Morate da unesete podatke o vasem nalogu :)";
			}
	}
?>


