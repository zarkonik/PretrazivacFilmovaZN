<?php
    require_once 'vendor/autoload.php';
    include_once 'Login.php';
    use GraphAware\Neo4j\Client\ClientBuilder;

    $client = ClientBuilder::create()
    //->addConnection('default', 'http://neo4j:graph123@localhost') // Example for HTTP connection configuration (port is optional)
    ->addConnection('bolt', 'bolt://neo4j:graph123@localhost') // Example for BOLT connection configuration (port is optional)
    ->build();
   
    $result = $client->run('MATCH (p:Post) return p.postid as postid, p.zanr as zanr, p.tekst as tekst');
    $records = $result->getRecords();
    
        for($i=0; $i<count($records); $i++){
        $postovi[$i] = $records[$i]->value('tekst');
        $_SESSION["zanr"][$i] = $records[$i]->value('zanr');
        $_SESSION["postid"][$i] = $records[$i]->value('postid');
        }
        $_SESSION["postovi"] = count($records);
        
    
    
    $redis = new Redis(); 
	$redis->connect('127.0.0.1'); 
	//echo "Connection to server sucessfully"; 
	//check whether server is running or not 
	//echo "Server is running: ".$redis->ping(); 
	
    $result1 = $client->run('MATCH (p:Post) return p.postid as postid, p.zanr as zanr, p.tekst as tekst ORDER BY p.createdAt');
    $records1 = $result1->getRecords();
    
		
        for($i=0; $i<count($records1); $i++){
			$postovi1[$i] = $records1[$i]->value('tekst');
			$redis->lPush('tekstovi', $postovi1[$i]);
			//$_SESSION["zanr"][$i] = $records[$i]->value('zanr');
			$redis->lPush('zanrovi', $records1[$i]->value('zanr'));
			//$_SESSION["postid"][$i] = $records[$i]->value('postid');
			$redis->lPush('IdObjava', $records1[$i]->value('postid'));
        }

	$result2 = $client->run('MATCH (p:Post) return p.postid as postid, p.zanr as zanr, p.tekst as tekst, p.lajkovi as lajk ORDER BY p.lajkovi');
    $records2 = $result2->getRecords();
    
		
        for($i=0; $i<count($records2); $i++){
			$postovi2[$i] = $records2[$i]->value('tekst');
			$redis->lPush('tekstoviLike', $postovi2[$i]);
			//$_SESSION["zanr"][$i] = $records[$i]->value('zanr');
			$redis->lPush('zanroviLike', $records2[$i]->value('zanr'));
			//$_SESSION["postid"][$i] = $records[$i]->value('postid');
			$redis->lPush('IdObjavaLike', $records2[$i]->value('postid'));
			$redis->lPush('brLajkova', $records2[$i]->value('lajk'));
        }
         
    
       
    
   

?>