<?php 
    session_start();
    // set session
    function setSession(){
        return $_SESSION['token'] = random_bytes(21);
    }

?>