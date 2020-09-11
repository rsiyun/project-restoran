<?php 

    class DB  {
        
        //properti
        public $host="Localhost";
        private $user="root",
               $password="",
               $database="dbrestorant";
        
        public function __construct(){
            echo "Hello World";
        }
        public function selectData(){
            return "Select Data";
        }
        public function getDatabase() {
          return $this->database;
        }
        public function tampil()
        {
           return $this->selectData();
        }
        public static function insertData(){
            echo "Static function";
        }

    }
    DB::insertData();
    // $databases = new DB;
    // echo "</br>";
    // echo $databases->selectData();
    // echo "</br>";
    // echo $databases->host;
    // echo "</br>";
    // echo $databases->getDatabase();
    // echo "</br>";
    // echo $databases->tampil();

?>