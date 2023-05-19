 <?php
include_once 'User.php';

    class Korisnici{
        public $korisnici = [];
        public $brkorisnika = 0;

        public function __construct(){
           
        }

        public function dodajKorisnika($korisnik){
            $this->korisnici[$this->brkorisnika] = $korisnik;
            $this->brkorisnika++;

        }



    }



?> 