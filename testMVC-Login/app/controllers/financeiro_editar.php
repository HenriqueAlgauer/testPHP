<?php

class Financeiro_editar
{

    use Controller;

    public function index()
    {
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: login");
            exit();
        }

        $financeiro_editar = new Financeiro;

        $data['id'] = $_GET['id'];

        $finaceiroEncontrado = $financeiro_editar->first($data);

        $this->view('financeiro_editar', ['financeiro' => $finaceiroEncontrado]);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $data['id'] = $_GET['id'];

            $values = array(
                'nome' => $_POST['nome'],
                'valor' => floatval($_POST['valor']),
            );

            $result = $financeiro_editar->update($data['id'], $values);

            if ($result !== false && is_array($result) && count($result) > 0) {

                header("Location: " . ROOT . "/financeiros");
                exit;
            } else {
                header("Location: " . ROOT . "/financeiros");
            }
        }
    }
}
