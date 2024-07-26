<?php 
namespace Adapter;

class Kindle implements eReaderInterface{

    public function turnOn(){
    
        var_dump('turning on');
    }
    public function pressNextButton(){
    
        var_dump('pressing next button');
    }
}