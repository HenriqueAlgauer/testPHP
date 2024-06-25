<?php

class Venda_excluir
{
    use Controller;

    public function index()
    {
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: login");
            exit();
        }

        $venda_excluir = new Vendas;
        $vendaItens_excluir = new VendasItens;
        $financeiro_excluir = new Financeiro;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $opcao = $_POST['opcao'];
            $value =  $_GET['id'];
            $idColumn = 'codVenda';
            $idColumnFinanceiro = 'nome';
            $valueFin = 'venda id:' . $_GET['id'];

            if ($opcao == 0) {
                $vendaItens_excluir->delete($value, $idColumn);
                $venda_excluir->delete($value);
                $financeiro_excluir->delete($valueFin, $idColumnFinanceiro);
                header("Location: " . ROOT . "/venda");
                exit(); 
            } else {
                header("Location: " . ROOT . "/venda");
                exit();
            }
        }

        $this->view('venda_excluir');
    }
}
