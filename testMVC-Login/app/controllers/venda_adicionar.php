<?php

class Venda_adicionar {

    use Controller;

    public function index() {
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: login");
            exit();
        }

        $produtos = new Produtos;

        if (isset($_POST['buscarProduto'])) {
            $pesquisa = $_POST['buscarProduto'];
            $result = $produtos->searchByDescription($pesquisa);

            if ($result !== false && is_array($result) && count($result) > 0) {
                $this->view('venda_adicionar', ['produtos' => $result]);
            } else {
                $this->view('venda_adicionar', ['produtos' => []]);
            }
        } else {
            $result = $produtos->findAll();

            if ($result !== false && is_array($result) && count($result) > 0) {
                $this->view('venda_adicionar', ['produtos' => $result]);
            } else {
                $this->view('venda_adicionar', ['produtos' => []]);
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die("Token CSRF inválido.");
            }
            
            if (!isset($_POST['vendaData'])) {
                die("Dados da venda não enviados.");
            }

            $vendaData = json_decode($_POST['vendaData'], true);

            if ($vendaData === null) {
                die("Erro ao decodificar os dados da venda.");
            }

            $formaPagamento = $vendaData['formaPagamento'];
            $valorTotal = floatval($vendaData['totalPrice']);

            $vendaModel = new Vendas();

            try {
                $vendaModel->beginTransaction();
                
                $codVenda = $vendaModel->inserirVenda($formaPagamento, $valorTotal);

                if (!$codVenda) {
                    throw new Exception('Erro ao inserir a venda.');
                }

                // $vendaItem = new VendasItens();

                foreach ($vendaData['items'] as $item) {
                    $codProduto = $item['id'];
                    $quantidade = $item['quantidade'];
                    $valorItem = $item['valor'];

                    $vendaModel->inserirVendaItem($codVenda, $codProduto, $quantidade, $valorItem);
                }

                $vendaModel->commit();
                echo "Venda finalizada com sucesso!";
            } catch (Exception $e) {
                if ($vendaModel->inTransaction()) {
                    $vendaModel->rollback();
                }
                echo "Erro ao finalizar a venda: " . $e->getMessage();
            }
        }
    }
}
