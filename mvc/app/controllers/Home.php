<?php 

class Home{

    use Controller;

    public function index(){

        $user = new User;
        $arr['name']= 'mary';
        $arr['age']= 29;
        
        $result = $user->insert($arr);

        $this->view('home');
    }
}