<?php

class Produto
{
    use Controller;

    public function index()
    {
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: login");
            exit();
        }
        $produtos = new Produtos;

        if (isset($_POST['buscarProduto'])) {
            $pesquisa = $_POST['buscarProduto'];
            $result = $produtos->searchByDescriptionProduto($pesquisa);

            if ($result !== false && is_array($result) && count($result) > 0) {
                $this->view('produtos', ['produtos' => $result]);
            } else {

                $this->view('produtos', ['produtos' => []]);
            }
        } else {
            $result = $produtos->findAllProdutos();

            if ($result !== false && is_array($result) && count($result) > 0) {
                $this->view('produtos', ['produtos' => $result]);
            } else {
                $this->view('produtos', ['produtos' => []]);
            }
        }
    }
}