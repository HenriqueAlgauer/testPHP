<?php

class User {

    use Model;
    protected $table = 'usuario';

    protected $allowedColumns = [
        'login',
        'senha'
    ];

    public function validate($data) {
        $this->errors = [];

        if (empty($data['login'])) {
            $this->errors['login'] = "Insira o nome de usuário";
        } else {
            if ($this->loginExists($data['login'])) {
                $this->errors['login'] = "O nome de usuário já está em uso";
            }
        }

        if (empty($data['senha'])) {
            $this->errors['senha'] = "Insira a senha válida";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    private function loginExists($login) {
        $query = "SELECT * FROM $this->table WHERE login = :login";
        $result = $this->get_row($query, ['login' => $login]);
        return $result ? true : false;
    }
}