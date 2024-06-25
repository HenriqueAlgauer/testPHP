<?php

class Financeiro_adicionar
{

    use Controller;

    public function index()
    {
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: login");
            exit();
        }
        $financeiro_adicionar = new Financeiro;

        date_default_timezone_set('America/Sao_Paulo');

        $this->view('financeiro_adicionar');

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['nome']) ||  empty($_POST['valor'])) {
                $_SESSION['error'] = 'Preencha valores Validos';
                
            } else {

                $values = array(
                    'tipo' => 'debito',
                    'nome' => $_POST['nome'],
                    'valor' => floatval($_POST['valor']),
                    'data' => date('Y-m-d')
                );


                $financeiro_adicionar->insert($values);

                header("Location: " . ROOT . "/financeiro_debito");
            }
        }
    }
}