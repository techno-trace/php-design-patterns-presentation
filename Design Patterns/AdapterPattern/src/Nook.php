<?php 
namespace Adapter;

class Nook implements eReaderInterface{

    public function turnOn(){
    
        var_dump('turning on Nook');
    }
    public function pressNextButton(){
    
        var_dump('pressing next button on Nook');
    }
}