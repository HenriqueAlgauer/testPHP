<?php 

class Logout {

    use Controller;

    public function index(){
        unset($_SESSION['username']);
        unset($_SESSION['loggedin']);
        
        $this->view('home');
    }

}