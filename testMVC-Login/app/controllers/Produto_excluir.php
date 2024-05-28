<?php

class Produto_excluir
{

    use Controller;

    public function index()
    {
        $produto_excluir = new Produtos;

        $value = $_GET['id'];

        $produto_excluir->delete($value);


        $this->view('produto_excluir', ['value' => $value]);
    }
}
