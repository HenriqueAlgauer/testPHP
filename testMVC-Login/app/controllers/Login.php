<?php

class Login {

    use Controller;

    public function index() {
        
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $user = new User;
            $arr['login'] = $_POST['login'];
            $login = $_POST['login'];
            $senha = $_POST['senha'];

            $row = $user->first($arr);
            
            if ($row && isset($row->senha)) {
                if (password_verify($senha, $row->senha)) {
                    $_SESSION['LOGIN'] = $row;
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $login;
                    
                    if (isset($_POST['lembrar'])) {
                        setcookie('login', $login, time() + (86400 * 30), "/");
                        setcookie('senha', $senha, time() + (86400 * 30), "/");
                        setcookie('lembrar', '1', time() + (86400 * 30), "/");
                    } else {
                        if (isset($_COOKIE['login'])) {
                            setcookie('login', '', time() - 3600, "/"); 
                        }
                        if (isset($_COOKIE['senha'])) {
                            setcookie('senha', '', time() - 3600, "/");
                        }
                        if (isset($_COOKIE['lembrar'])) {
                            setcookie('lembrar', '', time() - 3600, "/");
                        }
                    }

                    redirect('dashboard');
                }
            }
                        
            $user->errors['login'] = "Login ou senha inválido";
            
            $data['errors'] = $user->errors;
        }

        $this->view('login', $data);
    }
}