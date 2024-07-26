<?php 

/* 
An Adapter allows us to convert or translater one interface to another

*/

use Adapter\Book;
use Adapter\BookInterface;
use Adapter\Kindle;
use Adapter\eReaderAdapter;
use Adapter\Nook;

require __DIR__ . '/vendor/autoload.php';

class Person {
    public function read(BookInterface $book){
    
        $book->open();
        $book->turnPage();
    }
}

(new Person)->read(new eReaderAdapter(new Kindle));

(new Person)->read(new eReaderAdapter(new Nook));


/* Laravel FileSystem Adapter Wraps the Flysystem API using the same pattern */