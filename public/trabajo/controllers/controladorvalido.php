<?php

class controladorvalido{
    


     function cerrarsesion(){
        use "\Core\App";
        session_start();
        $_SESSION = array();
        session_destroy();
        setcookie(session_name(), "", time() - 1, "/");
        echo "aaaa";
        header("Location: ?method=login");
    }
}