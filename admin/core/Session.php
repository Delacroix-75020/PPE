<?php
    class Session{
        
        public function __construct(){
            
            session_start();
        }
        
        public function setVar($key, $value){
            
            $_SESSION[$key] = $value;
        }
        
        public function getVar($key){
            
            return isset($_SESSION[$key]) ? $_SESSION[$key] : '';
        }
        
        public function exist($key){
            
            return isset($_SESSION[$key]) ? true : false;
        }
        
        public function destroy(){
            
            $_SESSION = array();
            session_destroy();
            header("location:home");
        }

    }

    
?>
