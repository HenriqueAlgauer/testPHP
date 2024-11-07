<?php 

Trait Model{

    use Database;

    protected $limit = 10;
    protected $offset = 0;
    protected $order_type= "desc";
    protected $order_column= 'id';
    public $errors = [];


    public function findAll(){
        $query = "SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";

        return $this->query($query);
    }
    public function findAllVendaProds(){
        $query = "SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type  ";

        return $this->query($query);
    }

    public function findAllProdutos(){
        $query = "SELECT * FROM $this->table  ORDER BY $this->order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";

        return $this->query($query);
    }

    public function where($data, $data_not = []){
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach($keys as $key){
            $query .= $key . " = :". $key . " && ";
        }
        
        foreach($keys_not as $key){
            $query .= $key . " != :". $key . " && ";            
        }

        $query = trim($query, " && ");

        $query .= " ORDER BY $this->order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";
        $data = array_merge($data, $data_not);
        
        return $this->query($query, $data);
    }

    
    public function first($data, $data_not = []){
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach($keys as $key){
            $query .= $key . " = :". $key . " && ";
        }
        
        foreach($keys_not as $key){
            $query .= $key . " != :". $key . " && ";            
        }

        $query = trim($query, " && ");

        $query .= " limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not);

        $result = $this->query($query, $data);
        if($result) 
            return $result[0];
        return false;
    }


    public function insert($data){
        if(!empty($this->allowedColumns)){
            foreach($data as $key => $value) {
                if(!in_array($key, $this->allowedColumns)){
                    unset($data[$key]);
                }
            }
        }
        
        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (".implode(",", $keys).") VALUES (:".implode(",:", $keys).") ";
        
        $this->query($query, $data);

        return false;
    }


    public function update($id, $data, $id_column = 'id'){

        /*remove unwanted data */
        if(!empty($this->allowedColumns)){
            foreach($data as $key => $value) {
                if(!in_array($key, $this->allowedColumns)){
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        
        $query = "UPDATE $this->table SET  ";
        
        foreach($keys as $key){
            $query .= $key . " = :". $key . ", ";
        }
        
        $query = trim($query, ", ");
        
        $query .= " WHERE $id_column = :id";
        
        $data[$id_column] = $id;
        $this->query($query, $data);

        return false;
    }


    public function delete($id, $id_column = 'id'){
        $data[$id_column] = $id;
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column"; // Certifique-se de que o placeholder corresponda ao nome da coluna
        return $this->query($query, $data);
    }

    public function deleteProduto($id, $id_column = 'id'){
        $data[$id_column] = $id;
        $query = "UPDATE $this->table SET estado = 'inativo' WHERE $id_column = :id"; // Certifique-se de que o placeholder corresponda ao nome da coluna
        return $this->query($query, $data);
    }
    

    public function searchByDescription($description)
    {
        $query = "SELECT * FROM $this->table WHERE nome LIKE :description";
        $data = [':description' => "%$description%"];
        return $this->query($query, $data);
    }

    public function searchByDescriptionProduto($description)
    {
        $query = "SELECT * FROM $this->table WHERE nome LIKE :description AND estado = 'ativo'";
        $data = [':description' => "%$description%"];
        return $this->query($query, $data);
    }

    public function searchByDescriptionFinDeb($description) {
        $query = "SELECT * FROM $this->table WHERE descricao LIKE :description AND tipo = 'debito'";
        $data = [':description' => "%$description%"];
        return $this->query($query, $data);
    }

    public function searchByDescriptionFinCred($description) {
        $query = "SELECT * FROM $this->table WHERE descricao LIKE :description AND tipo = 'credito'";
        $data = [':description' => "%$description%"];
        return $this->query($query, $data);
    }

    public function findByType($type) {
        $query = "SELECT * FROM $this->table WHERE tipo = :type";
        $params = ['type' => $type];
        return $this->query($query, $params);
    }
}