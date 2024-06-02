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
        try {
            $query = "INSERT INTO vendas (formaPagamento, valorTotal) VALUES (:formaPagamento, :valorTotal)";
            $stmt = $this->conn->prepare($query);
            $params = [
                ':formaPagamento' => $formaPagamento,
                ':valorTotal' => $valorTotal
            ];
            $stmt->execute($params);
            $codVenda = $this->conn->lastInsertId();
            if ($codVenda) {
                return $codVenda;
            } else {
                error_log("Erro ao obter o ID da venda inserida.");
                return false;
            }
        } catch (PDOException $e) {
            error_log("Erro ao inserir a venda: " . $e->getMessage());
            return false;
        }
    }
}
?>