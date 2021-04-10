<?php
    session_start();
    function logout(){
        if ($_SESSION['token'] != null) {
        $_SESSION['token'] = null;
        return header('location: login.php');
        }
    }

    logout();

?>