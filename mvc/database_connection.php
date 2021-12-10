<?php
//connecting to database using credentials

//first require credentials
define("server", "localhost");
define("username", "root");
define("password", '');
define("database", "placeme_db");

class Database{
    //setting properties
    public $db=null;
    public $results=null;

    //connect method
    public function connect(){
        $this->db=mysqli_connect(server, username, password, database);

        if(mysqli_connect_error()){
            return false;

        }else{
        return true;
    
    }
}

//create a function to run query
public function run($query){
    if(!$this->connect()){
        return false;
    }elseif($this->db==null){
        return false;
    }
    //run query
    $this->results=mysqli_query($this->db, $query);
    if($this->results==false){
        return false;
    }else{
    return true;
    
}
}

//fetching results
    function fetch(){
        //check if result is set
        if($this->results==null){
            return false;
        }elseif($this->results==false){
            return false;
        } 
        return mysqli_fetch_assoc($this->results);
        
    
    }
}


?>