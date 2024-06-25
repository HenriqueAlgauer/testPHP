<?php

class Financeiros
{
    use Controller;

    public function index()
    {
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: login");
            exit();
        }
        $fin = new Financeiro;

        if (isset($_POST['buscaFin'])) {
            $pesquisa = $_POST['buscaFin'];
            $result = $fin->searchByDescription($pesquisa);

            if ($result !== false && is_array($result) && count($result) > 0) {
                $this->view('financeiro', ['financeiro' => $result]);
            } else {
                $this->view('financeiro', ['financeiro' => []]);
            }
        } else {
            $result = $fin->findAll();

            if ($result !== false && is_array($result) && count($result) > 0) {
                $this->view('financeiro', ['financeiro' => $result]);
            } else {
                $this->view('financeiro', ['financeiro' => []]);
            }
        }
    }
}