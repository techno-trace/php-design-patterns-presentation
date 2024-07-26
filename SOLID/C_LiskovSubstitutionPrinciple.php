<?php

/*

* Derived classed must be substitutable for their base classes

Barbara Liskov
* Signature must match

* Preconditions for the subclass can't be greater

* Coding to a contract can validate the input but can ensure the output until php 8

* Post conditions at least equal to

* Exception Types must match


*/




class VideoPlayer
{

    /**
 *
 * @return string
 **/
    public function play(): string
    {
        return "play Video";
    }
}

class AviVideoPlayer extends VideoPlayer
{
    public function play(): string
    {
        return []; // Should only return string as per parent method
    }
}
