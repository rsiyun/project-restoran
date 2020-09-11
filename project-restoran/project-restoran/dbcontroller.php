<?php 

    class DB{
       private $host="localhost",
               $user="root",
               $password="",
               $database="dbrestorant",
               $conn;


        public function connectionbase(){
            $conn=mysqli_connect($this->host,$this->user,$this->password,$this->database);
            return $conn;
        }
        public function __construct(){
            $this->conn=$this->connectionbase();
        }
        public function getAll($sql){
            $result = mysqli_query($this->conn,$sql);
            while ($row=mysqli_fetch_assoc($result)) {
                $rows[]=$row;
            }
            if (!empty($rows)) {
                return $rows;
            }
            
        } 
        public function getItem($sql){
            $result = mysqli_query($this->conn,$sql);
            $row=mysqli_fetch_assoc($result);
            return $row;
        }
        public function rowCount($sql){
            $result = mysqli_query($this->conn,$sql);
            $count = mysqli_num_rows($result);
            return $count;
        }
        public function runSql($sql){
            $result = mysqli_query($this->conn,$sql);
        }
        public function pesan($text="")
        {
            echo $text;
        }

    }
    $base=new DB;
?>