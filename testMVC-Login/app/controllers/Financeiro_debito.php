<?php

class Financeiro_debito {

    use Controller;

    public function index() {
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: login");
            exit();
        }

        $fin = new Financeiro;

        if (isset($_POST['id'])) {
            $arr['id'] = $_POST['id'];
            $fin = new Financeiro;
            $t = $fin->first($arr);

            $fin->delete($arr['id']);
            
            header("Location: " . ROOT . "/financeiro_debito");
            exit();
        }   
        if (isset($_POST['id_edit'])) {
            $arr['id'] = $_POST['id_edit'];
            $fin = new Financeiro;
            $t = $fin->first($arr);

            // if ($t && $t->tipo === 'debito') {
                header("Location: " . ROOT . "/financeiro_editar?id=". $arr['id']);
            // } 
        
        }

        if (isset($_POST['buscaFin'])) {
            $pesquisa = $_POST['buscaFin'];
            $result = $fin->searchByDescriptionFinDeb($pesquisa);
        } else {
            $result = $fin->findByType('debito');
        }

        if ($result !== false && is_array($result) && count($result) > 0) {
            $this->view('financeiro_debito', ['financeiro' => $result]);
        } else {
            $this->view('financeiro_debito', ['financeiro' => []]);
        }
    }
}