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
}