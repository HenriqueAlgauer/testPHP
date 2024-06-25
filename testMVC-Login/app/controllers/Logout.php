<?php 

class Logout {

    use Controller;

    public function index(){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        unset($_SESSION['loggedin']);
        session_destroy();

        if (isset($_COOKIE['login'])) {
            setcookie('login', '', time() - 3600, "/");
        }
        if (isset($_COOKIE['senha'])) {
            setcookie('senha', '', time() - 3600, "/");
        }
        if (isset($_COOKIE['lembrar'])) {
            setcookie('lembrar', '', time() - 3600, "/");
        }


        $this->view('logout');
    }

}