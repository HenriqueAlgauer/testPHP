<?php

class Produto_editar {

    use Controller;

    public function index() {
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: login");
            exit();
        }

        $produto_editar = new Produtos;

        $data['id'] = $_GET['id'];

        $produtoEncontrado = $produto_editar->first($data);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data['id'] = $_GET['id'];

            $nome = $_POST['nome'];
            $preco = floatval($_POST['preco']);
            $estoque = intval($_POST['estoque']);

            if ($estoque > 1) {
                $values = array(
                    'nome' => $nome,
                    'preco' => $preco,
                    'estoque' => $estoque
                );

                $produto_editar->update($data['id'], $values);
                header("Location: " . ROOT . "/produto");
                exit();
            } else {
                $error = "O estoque precisa ser maior que 1.";
                $this->view('produto_editar', ['produto' => $produtoEncontrado, 'error' => $error]);
                return;
            }
        } else {
            $this->view('produto_editar', ['produto' => $produtoEncontrado]);
        }
    }
}
?>