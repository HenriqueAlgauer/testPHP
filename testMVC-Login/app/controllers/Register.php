<?php 

class Register{

    use Controller;
    
    public function index(){

        $data = [];
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $user = new User;
            
            if($user->validate($_POST)){
                $_POST['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                
                $user->insert($_POST);
                redirect('login');
            }
            
            $data['errors'] = $user->errors;
        }
            
        $this->view('register', $data);
    }
}