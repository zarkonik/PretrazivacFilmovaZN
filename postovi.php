<?php
    require_once 'vendor/autoload.php';
    include_once 'Login.php';
    use GraphAware\Neo4j\Client\ClientBuilder;

    $client = ClientBuilder::create()
    //->addConnection('default', 'http://neo4j:graph123@localhost') // Example for HTTP connection configuration (port is optional)
    ->addConnection('bolt', 'bolt://neo4j:graph123@localhost') // Example for BOLT connection configuration (port is optional)
    ->build();
   
    $result = $client->run('MATCH (u:User {name:{user}})-[:POSTED]->(post) return u.brpostova as brpostova, collect(post) as posts', ['user' => $_SESSION["username"]]);
    $records = $result->getRecords();
    foreach($records as $record){
        for($i=0; $i<$record->value('brpostova'); $i++){
        $postovi[$i] = $record->value('posts')[$i]->value('tekst');
        $_SESSION["zanr"][$i] = $record->value('posts')[$i]->value('zanr');
        $_SESSION["postid"][$i] = $record->value('posts')[$i]->value('postid');
        $_SESSION["brpostova"]= $record->value('brpostova');
        }
    }
    
    
     
    $result1 = $client->run('MATCH (u:User {name:{user}})-[:POSTED]->(post) return u.brpostova as brpostova, collect(post) as posts', ['user' => $_SESSION["username"]]);
    $records = $result1->getRecords(); 
    foreach($records as $record){
        for($i=0; $i<$record->value('brpostova'); $i++){
        $postovid[$i] = $record->value('posts')[$i]->value('postid');
        $result2 = $client->run('MATCH (p:Post {postid:{pid}})<-[:COMMENT_TO]-(coment) return p.komentari as brkom, collect(coment) as coments', ['pid' => $postovid[$i]]);
            ////vidi kako da postavis vrednost broja komentara kako treba!!!
            $records1 = $result2->getRecords();
            foreach($records1 as $record1){
            $_SESSION["pbrkom"][$i]=$record1->value('brkom');
            for($j=0; $j<$record1->value('brkom'); $j++){
            $komentari[$i][$j] = $record1->value('coments')[$j]->value('tekst');
              //  }
            }
        }
        }
    }
   
?>

