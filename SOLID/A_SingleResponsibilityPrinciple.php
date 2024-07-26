<?php 
/* 
*A class should have only one job to do / only one responsibility.

*It has too many reasons to change

*There are too many consumers of this class

*To change functionality this class would have to change

*If it's doing more than one than it doing much more and it violates SRP

* Remove application Logic like login from this class

* Possible fixes to use repositories for fetching db resullts and inject repo using dependency injection

* Use of separate PaymentMethodInterface for more flexibility

*/


class LaundryReporter{


    public function between($start, $end){
    
        $this->login(); //Perform Login

        $db = $this->queryDbForLaundries(); // Get Results

        $this->acceptCash(); //Accept Cash Payment
    }

    public function login(){
    
        return true; // Login User
    }

    public function queryDbForLaundries(){
    
        return [1,2]; // Return Laundry results
    }

    public function acceptCash(){
    
        return "Cash accepted";
    }
}