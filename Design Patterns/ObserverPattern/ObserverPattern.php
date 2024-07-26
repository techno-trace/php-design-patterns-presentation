<?php

// Change in one object needs to have a flexible, decoupled way to notify other objects so that they can do whatever they want to perform

interface Subject
{ //Publisher

    public function attach($observer);
    
    public function detach($observer);
    
    public function notify();
}

interface Observer
{ //Subscriber

    public function handle();
}

trait SubjectDRY
{
    public function attachObservers($observable)
    {
        foreach ($observable as $observer) {
            if (! $observer instanceof Observer) {
                throw new Exception('Invalid Observer');
            }
            
            $this->attach($observer);
        }
    }

    public function fire()
    {
        $this->notify();
    }
}

class Login implements Subject
{
    use SubjectDRY;

    protected $observers = [];

    public function attach($observable)
    {
        if (is_array($observable)) {
            return $this->attachObservers($observable);
        }

        $this->observers[] = $observable;
    }

    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->handle();
        }
    }
}


class LogHandler implements Observer
{
    public function handle()
    {
        var_dump('log something imp.');
    }
}
class EmailNotifier implements Observer
{
    public function handle()
    {
        var_dump('log something imp email.');
    }
}
class LoginReporter implements Observer
{
    public function handle()
    {
        var_dump('report something imp email.');
    }
}

$login = new Login;

$login->attach([
    new LogHandler,
    new EmailNotifier,
    new LoginReporter
]);

$login->fire();


/* 
Event::listen('user.login', function(){

    var_dump('login');
});
Event::listen('user.login', function(){

    var_dump('login other way');
}); */

