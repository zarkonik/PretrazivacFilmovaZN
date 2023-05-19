<?php

require_once 'vendor/autoload.php';
//include_once 'Korisnici.php';

use GraphAware\Neo4j\Client\ClientBuilder;

 $client = ClientBuilder::create()
	    //->addConnection('default', 'http://neo4j:graph123@localhost') // Example for HTTP connection configuration (port is optional)
	    ->addConnection('bolt', 'bolt://neo4j:graph123@localhost') // Example for BOLT connection configuration (port is optional)
		 ->build();

	//$client->run('CREATE (u:User)');
	$postoji = false;
	if(isset($_POST['username']) && isset($_POST['password']) ){
		$result = $client->run('MATCH (u:User) return u, u.name as name, u.password as password, u.brpostova as brpostova');
		$records = $result->getRecords();
		foreach($records as $record){
			if($record->value('name') == $_POST['username'])
			 	$postoji = true;	
		}
			  
		 
		if($_POST['username'] != "" && $_POST['username'] != NULL && $_POST['password'] != "" && $_POST['password'] != NULL && $postoji == false){
		$client->run('CREATE (u:User {name: {korisnik}, password:{pass}, brpostova:{br}, komentari:{koment}})', ['korisnik' => $_POST['username'], 'pass' => $_POST['password'], 'br' => "0" , 'koment' => "0"], 'user_create' );
		echo "Uspesno ste kreirali nalog";
		//$korisnik = new User($_POST['username'], $_POST['password']);
		//$novi = new Korisnici();	
		//$novi->dodajKorisnika($korisnik);
		}
		else if($_POST['username'] == "" || $_POST['username'] == NULL && $_POST['password'] != "" && $_POST['password'] != NULL && $postoji == false)	{
			echo "Niste uneli korisnicko ime";
		}
		else if($_POST['username'] != "" && $_POST['username'] != NULL && $_POST['password'] == "" || $_POST['password'] == NULL && $postoji == false)	{
			echo "Niste uneli šifru";
		}
		else if($_POST['username'] != "" && $_POST['username'] != NULL && $_POST['password'] != "" && $_POST['password'] != NULL && $postoji == true){
			echo "Uneli ste već postojece korisničko ime. Ukoliko je to vaš nalog, molimo vas da se ulogujete na stranici za logovanje.";
			echo "Ukoliko ne posedujete nalog sa ovim korisničkim imenom, molimo vas da izaberete neko drugo korisničko ime.";
		}
		
		
		
	
		
	}
	?>
	

	
	
