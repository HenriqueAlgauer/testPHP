<?php
class Vendas {
    use Model;

    protected $table = 'vendas';

    protected $allowedColumns = [
        'id',
        'formaPagamento',
        'valorTotal',
        'dataVenda'
    ];

    private $conn;

    public function __construct() {
        $this->conn = $this->connect();
    }

    public function beginTransaction() {
        $this->conn->beginTransaction();
    }

    public function commit() {
        $this->conn->commit();
    }

    public function rollback() {
        if ($this->conn->inTransaction()) {
            $this->conn->rollBack();
        }
    }

    public function inTransaction() {
        return $this->conn->inTransaction();
    }

    public function inserirVenda($formaPagamento, $valorTotal) {
        $query = "INSERT INTO vendas (formaPagamento, valorTotal) VALUES (:formaPagamento, :valorTotal)";
        $stmt = $this->conn->prepare($query);
        $params = [
            ':formaPagamento' => $formaPagamento,
            ':valorTotal' => $valorTotal
        ];
        $stmt->execute($params);
        return $this->conn->lastInsertId();
    }

    public function inserirVendaItem($codVenda, $codProduto, $quantidade, $valorItem) {
        $query = "INSERT INTO vendasItens (codVenda, codProduto, quantidade, valorItem) VALUES (:codVenda, :codProduto, :quantidade, :valorItem)";
        $stmt = $this->conn->prepare($query);
        $params = [
            ':codVenda' => $codVenda,
            ':codProduto' => $codProduto,
            ':quantidade' => $quantidade,
            ':valorItem' => $valorItem
        ];
        $stmt->execute($params);
    }
}
?>