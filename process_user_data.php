<?php
class ProcessUserData {
    public static function start_session()
    {
        session_start();
        return;
    }
    public static function clear_and_destroy_session()
    {
        session_unset();
        session_destroy();
        return;
    }
    public static function store_as_session($name, $value){
        $_SESSION[$name]=$value;
        return;
    }
    public static function store_as_cookie($cookie_name, $cookie_value){
        setcookie($cookie_name, $cookie_value, time()+86400, "/");
        return;
    }
    public static function unset_cookie($name)
    {
        setcookie($name);
        return;
    }
}