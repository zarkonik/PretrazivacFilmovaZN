<?php

require_once 'vendor/autoload.php';
include_once 'Login.php';
//include_once 'Post.php';
//include_once 'Korisnici.php';
use GraphAware\Neo4j\Client\ClientBuilder;



$client = ClientBuilder::create()
    //->addConnection('default', 'http://neo4j:graph123@localhost') // Example for HTTP connection configuration (port is optional)
    ->addConnection('bolt', 'bolt://neo4j:graph123@localhost') // Example for BOLT connection configuration (port is optional)
    ->build();
    
   
    $result = $client->run('MATCH (u:User {name:{user}}) return u, u.name as name, u.password as password, u.brpostova as brpostova', ['user' => $_SESSION['username']]);
    $record = $result->getRecord();
    $brp = $record->value('brpostova');
    $brp++;
    $pid = $_SESSION["username"]."_".$brp;
   


    $client->run('CREATE (p:Post {postid: {postid}, tekst:{tekst}, zanr:{zanra}, komentari:{kom}, lajkovi:{lajk}, createdAt:TIMESTAMP()})', ['postid' => $pid, 'tekst' => $_POST["tekst"], 'zanra' => $_POST["gender"], 'kom' => "0", 'lajk' => "0"] );
    $client->run('MATCH (u:User {name:{user}} ), (p:Post {postid:{pid}}) MERGE (u)-[r:POSTED]->(p) RETURN id(r) as relId',['user' =>$_SESSION['username'], 'pid' => $pid], 'user_follows');
    $client->run('MATCH (u:User {name:{user}}) SET u.brpostova = {br}', ['user' => $_SESSION["username"], 'br' => $brp]);
    echo "Vasa objava je uspesno postavljena";
?>
