<?php

class VendasItens {

    use Model;

    protected $table = 'vendasitens';

    protected $allowedColumns = [
        'id',
        'codVenda',
        'codProduto',
        'quantidade',
        'valorItem',
        'valorTotal'
    ];

    public function inserirVendaItem($codVenda, $codProduto, $quantidade, $valorItem) {
        try {
            $data = [
                'codVenda' => $codVenda,
                'codProduto' => $codProduto,
                'quantidade' => $quantidade,
                'valorItem' => $valorItem
            ];
            $result = $this->insert($data);
            if (!$result) {
                error_log("Erro ao inserir item da venda: " . json_encode($data));
            }
            return $result;
        } catch (PDOException $e) {
            error_log("Erro ao inserir item da venda: " . $e->getMessage());
            return false;
        }
    }

    private function insert($data) {
        try {
            $columns = implode(", ", array_keys($data));
            $values = implode(", ", array_map(function($key) {
                return ":$key";
            }, array_keys($data)));

            $query = "INSERT INTO {$this->table} ($columns) VALUES ($values)";
            $stmt = $this->connect()->prepare($query);

            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            error_log("Erro no método insert: " . $e->getMessage());
            return false;
        }
    }
    
}