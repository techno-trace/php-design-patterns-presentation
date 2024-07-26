<?php

/*
* Client should never be forced to implement interfaces that it never use

* Even interface having one method isn't wrong

* A fat interface breaks SRP

*/


interface WorkableInterface
{
    public function work();
}
interface SleepableInterface
{
    public function work();
}
interface ManagableInterface
{
    public function beManaged();
}

class Worker implements WorkableInterface, SleepableInterface, ManagableInterface
{
    public function work()
    {
        return ;
    }

    public function sleep()
    {
        return ;
    }

    public function beManaged(){
    
        $this->work();

        $this->sleep();
    }
}

class Android implements WorkableInterface, ManagableInterface
{
    public function work()
    {
        return ;
    }

    public function beManaged(){
    
        $this->work();
    }
}


class Captain
{
    public function hire(ManagableInterface $worker)
    {
        $worker->beManaged();
    }
}
