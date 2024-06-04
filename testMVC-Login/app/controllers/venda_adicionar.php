<?php

class Venda_adicionar {

    use Controller;

    public function index() {
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: login");
            exit();
        }

        $produtos = new Produtos;
        $error = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                    throw new Exception("Token CSRF inválido.");
                }

                if (!isset($_POST['vendaData'])) {
                    throw new Exception("Dados da venda não enviados.");
                }

                $vendaData = json_decode($_POST['vendaData'], true);

                if ($vendaData === null) {
                    throw new Exception("Erro ao decodificar os dados da venda.");
                }

                if (empty($vendaData['items'])) {
                    throw new Exception("A venda não pode estar vazia.");
                }
                
                $formaPagamento = $vendaData['formaPagamento'];
                $valorTotal = floatval($vendaData['totalPrice']);

                $vendaModel = new Vendas();
                $produtoModel = new Produtos();

                $vendaModel->beginTransaction();

                foreach ($vendaData['items'] as $item) {
                    $codProduto = $item['id'];
                    $quantidade = $item['quantidade'];

                    $produto = $produtoModel->first(['id' => $codProduto]);

                    if ($produto === false || $produto->estoque < $quantidade) {
                        throw new Exception('Estoque insuficiente para o produto ID: ' . $codProduto);
                    }
                }

                $codVenda = $vendaModel->inserirVenda($formaPagamento, $valorTotal);

                if (!$codVenda) {
                    throw new Exception('Erro ao inserir a venda.');
                }

                foreach ($vendaData['items'] as $item) {
                    $codProduto = $item['id'];
                    $quantidade = $item['quantidade'];
                    $valorItem = $item['valor'];

                    $vendaModel->inserirVendaItem($codVenda, $codProduto, $quantidade, $valorItem);
                }

                $vendaModel->commit();
                return;
            } catch (Exception $e) {
                if ($vendaModel->inTransaction()) {
                    $vendaModel->rollback();
                }
                $error = $e->getMessage();
            }
        }

        if (isset($_POST['buscarProduto'])) {
            $pesquisa = $_POST['buscarProduto'];
            $result = $produtos->searchByDescription($pesquisa);
        } else {
            $result = $produtos->findAll();
        }

        if ($result === false || !is_array($result) || count($result) === 0) {
            $result = [];
            if (empty($error)) {
                $error = "Nenhum produto encontrado.";
            }
        }

        $this->view('venda_adicionar', ['produtos' => $result, 'error' => $error]);
    }
}
?>