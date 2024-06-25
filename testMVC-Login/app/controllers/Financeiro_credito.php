<?php

class Financeiro_credito {
      
    use Controller;

    public function index() {
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: login");
            exit();
        }

        $fin = new Financeiro;

        if (isset($_POST['buscaFin'])) {
            $pesquisa = $_POST['buscaFin'];
            $result = $fin->searchByDescriptionFinCred($pesquisa);
        } else {
            $result = $fin->findByType('credito');
        }

        if ($result !== false && is_array($result) && count($result) > 0) {
            $this->view('financeiro_credito', ['financeiro' => $result]);
        } else {
            $this->view('financeiro_credito', ['financeiro' => []]);
        }
    }
}
?>