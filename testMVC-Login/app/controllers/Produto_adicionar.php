<?php 

class Produto_adicionar{

    use Controller;
    
    public function index(){
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: login");
            exit();
        }
        $produto_adicionar = new Produtos;

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $nome = $_POST['nome'];
            $preco = floatval($_POST['preco']);
            $estoque = intval($_POST['estoque']);

            if ($estoque > 0) {
                $values = array(
                    'nome' => $nome,
                    'preco' => $preco,
                    'estoque' => $estoque
                );

                $produto_adicionar->insert($values);
                header("Location: " . ROOT . "/produto");
            } else {
                $error = "O estoque precisa ser maior que 0.";
                $this->view('produto_adicionar', ['error' => $error]);
                return;
            }
        }else{
            $this->view('produto_adicionar');
        }
    }
}