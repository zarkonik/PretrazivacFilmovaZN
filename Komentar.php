<?php

require_once 'vendor/autoload.php';
include_once 'postovi.php';
//include_once 'Post.php';
//include_once 'Korisnici.php';
use GraphAware\Neo4j\Client\ClientBuilder;


if(isset($_POST["komentar"])){
$client = ClientBuilder::create()
    //->addConnection('default', 'http://neo4j:graph123@localhost') // Example for HTTP connection configuration (port is optional)
    ->addConnection('bolt', 'bolt://neo4j:graph123@localhost') // Example for BOLT connection configuration (port is optional)
    ->build();
    

    $result = $client->run('MATCH (u:User {name:{user}}) return u, u.name as name, u.komentari as brkom', ['user' => $_SESSION['username']]);
    $record = $result->getRecord();
    $brkom = $record->value('brkom');
    $brkom++;
    $komid = $_SESSION['username']."_kom_".$brkom;
    $pid = $_POST['hpid'];
    $result1 = $client->run('MATCH (p:Post {postid:{pid}}) return p, p.postid as postid, p.komentari as brkom', ['pid' => $pid]);
    $record1 = $result1->getRecord();
    $pbrkom = $record1->value('brkom');
    $pbrkom++;

    $client->run('CREATE (k:Komentar {komid: {komid}, tekst:{tekst}})', ['komid' => $komid, 'tekst' => $_POST['koment']] );
    $client->run('MATCH (u:User {name:{user}} ), (k:Komentar {komid:{komid}}) MERGE (u)-[r:COMMENTS]->(k) RETURN id(r) as relId',['user' =>$_SESSION['username'], 'komid' => $komid], 'user_follows');
    $client->run('MATCH (u:User {name:{user}}) SET u.komentari = {koment}', ['user' => $_SESSION["username"], 'koment' => $brkom]);
    $client->run('MATCH (p:Post {postid:{pid}}) SET p.komentari = {koment}', ['pid' => $pid, 'koment' => $pbrkom]);
    $client->run('MATCH (k:Komentar {komid:{komid}} ), (p:Post {postid:{postid}}) MERGE (k)-[r:COMMENT_TO]->(p) RETURN id(r) as relId',['postid' =>$pid, 'komid' => $komid], 'comment_follows');
    echo "Uspešno ste postavili komentar. :)";
}   
    if(isset($_POST["svidjanja"])){
        $client = ClientBuilder::create()
        //->addConnection('default', 'http://neo4j:graph123@localhost') // Example for HTTP connection configuration (port is optional)
        ->addConnection('bolt', 'bolt://neo4j:graph123@localhost') // Example for BOLT connection configuration (port is optional)
        ->build();
        $pid = $_POST['hpid'];
        $result1 = $client->run('MATCH (p:Post {postid:{pid}}) return p, p.postid as postid, p.lajkovi as lajkovi', ['pid' => $pid]);
        $record1 = $result1->getRecord();
        $pbrlajk = $record1->value('lajkovi');
        $pbrlajk++;
        $client->run('MATCH (p:Post {postid:{pid}}) SET p.lajkovi = {lajk}', ['pid' => $pid, 'lajk' => $pbrlajk]);
        echo "Povećali ste broj sviđanja objave. :)";
    }
   
?>

<!DOCTYPE HTML>
<html>
<head id="head">
<link rel="stylesheet" href ="stil.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>

 <input type="button" class="btn btn-lg btn-primary" name="nazad" value="Nazad na stranicu sa objavama" onclick="window.location.href='sve.php'" />

 
</body>
 </html>