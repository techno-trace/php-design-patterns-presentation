<?php

use Template\TurkeySub;
use Template\VeggieSub;

require __DIR__ . '/vendor/autoload.php';


(new TurkeySub)->make();

(new VeggieSub)->make();

/* 

Github Authentication Laracasts package uses the same terminology to prevent duplication to generalize the methods

*/