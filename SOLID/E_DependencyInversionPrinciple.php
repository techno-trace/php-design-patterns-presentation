<?php 

/*
 
* Depend on abstractions not on concretion
* All of this is about decoupling code

* High level code should depend upon abstractions and low level code should also should depend upon abstractions

*/


interface DBConnectionInterface{

    public function connect();
}

class MySQLConnection implements DBConnectionInterface{

    public function connect(){
    
        
    }
}

class PasswordReminder {


    /**
     * Class constructor.
     */
    public function __construct(DBConnectionInterface $mysql)
    {
        $this->mysql = $mysql;
    }
}