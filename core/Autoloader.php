<?php

class Autoloader{
    
    public static function register()
    {
        spl_autoload_register(array('Autoloader', 'load'));
    }
    
    public static function load($className){
        
        if(file_exists("core/".$className.".php"))
            require "core/".$className.".php";
        else
            require "core/HTML/".$className.".php";
        
    }
}

?>