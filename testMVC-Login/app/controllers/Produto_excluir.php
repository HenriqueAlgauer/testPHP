<?php

class Produto_excluir
{

    use Controller;

    public function index()
    {
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: login");
            exit();
        }
        
        $produto_excluir = new Produtos;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $opcao = $_POST['opcao']; 

            $value = $_GET['id'];

            if($opcao == 0){
                $produto_excluir->deleteProduto($value);
                
                header("Location: " . ROOT . "/produto");
            }else{
                header("Location: " . ROOT . "/produto");
            }
        }

        $this->view('produto_excluir');
    }
}