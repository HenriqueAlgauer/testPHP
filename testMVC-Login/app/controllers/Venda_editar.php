<?php

class Venda_editar
{

    use Controller;

    public function index()
    {
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: login");
            exit();
        }

        $venda_editar = new Vendas;

        $data['id'] = $_GET['id'];

        $venda_encontrada = $venda_editar->first($data);


        $this->view('venda_editar', ['venda' => $venda_encontrada]);

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $data['id'] = $_GET['id'];

            $values = array(
                'formaPagamento' => $_POST['formaPagamento'],
            );
            
            $result = $venda_editar->update($data['id'], $values);

            if ($result !== false && is_array($result) && count($result) > 0) {
                
                header("Location: " . ROOT . "/venda");
                exit; 
            } else {
                header("Location: " . ROOT . "/venda");
            }


            
        }
    }
}