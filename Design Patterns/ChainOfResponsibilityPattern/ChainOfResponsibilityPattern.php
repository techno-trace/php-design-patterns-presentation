<?php


// It gives us the ability to chain object calls while giving each object the responsibility to end the execution and handle the request and if it can't handle it then send the request up the chain

// Any of the objects in the chain have the ability to slice through the chain and the next won't be called


abstract class HomeChecker
{
    protected $successor;

    abstract public function check(HomeStatus $home);

    public function succeedWith(HomeChecker $successor)
    {
        $this->successor = $successor;
    }

    public function next(HomeStatus $home)
    {
        if ($this->successor) {
            $this->successor->check($home);
        }
    }
}

class Locks extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if ( ! $home->locked) {
            throw new Exception("Doors not locked, abort!!");
        }

        $this->next($home);
    }
}

class Lights extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if ( ! $home->lightsOff) {
            throw new Exception("Lights are still on, abort!!");
        }

        $this->next($home);
    }
}

class Alarm extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if ( ! $home->alarmOn) {
            throw new Exception("Alarm not set, abort!!");
        }

        $this->next($home);
    }
}

class HomeStatus
{
    public $alarmOn = true;
    public $locked = false;
    public $lightsOff = true;
}


$locks = new Locks;
$lights = new Lights;
$alarm = new Alarm;

$locks->succeedWith($lights);
$lights->succeedWith($alarm);

$locks->check(new HomeStatus);
