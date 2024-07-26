<?php
namespace Template;

class TurkeySub extends Sub
{
   /*  public function make()
    {
        return $this

        ->layBread()

        ->addLettuce()

        ->addTurkey()

        ->addSauces();
    }


    public function layBread()
    {
        var_dump('laying down bread');

        return $this;
    }
    public function addLettuce()
    {
        var_dump('adding lettuce');

        return $this;
    }

    public function addSauces()
    {
        var_dump('adding sauces');

        return $this;
    } */

    protected function addPrimaryToppings()
    {
        var_dump('adding turkey');

        return $this;
    }
   
}
