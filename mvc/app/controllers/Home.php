<?php 

class Home extends Controller{

    public function index($a = '', $b = '', $c=''){
        $user = new User;
        
        // $arr['name'] = 'teste do user';
        // $arr['age'] = 30;

        // $result = $user->where(['id'=>2, 'name'=>'Mary']);
        $result = $user->findAll();
        
        show($result);

        $this->view('home');
    }
}