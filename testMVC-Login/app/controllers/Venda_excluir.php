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

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $opcao = $_POST['opcao'];

            $value['id'] = $_GET['id'];

            $vendasItensAssociadas = $venda_excluir->where($value);


            if ($opcao == 0) {
                foreach ($vendasItensAssociadas as $row) {
                    $venda_excluir->delete($row['id']);
                }

                $venda_excluir->delete($value);

                header("Location: " . ROOT . "/venda");
            } else {
                header("Location: " . ROOT . "/venda");
            }
        }

        $this->view('venda_excluir');
    }
}
