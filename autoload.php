<?php

function controller_autoload($className){
    include 'app/controllers/'.$className.'.php';
}

spl_autoload_register('controller_autoload');