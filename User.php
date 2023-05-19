<?php
class User{
    public $username;
    public $password;
    public $postovi = [];
    public $brpostova = 0;

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }
    

    public function dodaj_Post($post){
        $this->postovi[$brpostova] = $post;
        $brpostova++;
    }


}
?>