<?php

class Financeiro{

    use Model;

    protected $table = 'financeiro';

    protected $allowedColumns = [
        'id',
        'tipo',
        'nome',
        'valor',
        'data'
    ];

    // public function validateRow($data){
    //     $this->errors = [];

    //     if(empty($data['id'])){
    //         $this->errors   ['id'] = "nunhum registro encontrado";
    //     }

    //     if(empty($this->errors)){
    //         return true;
    //     }
    //     return false;
    // }
}