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

        if (isset($_POST['id'])) {
            $arr['id'] = $_POST['id'];
            $fin = new Financeiro;
            $t = $fin->first($arr);

            if ($t && $t->tipo === 'debito') {
                $fin->delete($arr['id']);
            } else {
                $_SESSION['error'] = $t ? "Só é possível excluir registros do tipo 'debito'." : "Registro não encontrado.";
            }

            header("Location: " . ROOT . "/financeiros");
            exit();
        }

        if (isset($_POST['id_edit'])) {
            $arr['id'] = $_POST['id_edit'];
            $fin = new Financeiro;
            $t = $fin->first($arr);

            if ($t && $t->tipo === 'debito') {
                header("Location: " . ROOT . "/financeiro_editar?id=". $arr['id']);
            } else {
                $_SESSION['error'] = $t ? "Só é possível editar registros do tipo 'debito'." : "Registro não encontrado.";
                header("Location: " . ROOT . "/financeiros");
                exit();
            }
        }



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
