<?php 

class Contato{

    use Controller;

    public function index(){
        $this->view('contato');
    }
}