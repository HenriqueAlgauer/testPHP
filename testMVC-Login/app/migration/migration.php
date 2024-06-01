<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loja";

// Cria conexão
$conn = new mysqli($servername, $username, $password);

// Verifica conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cria banco de dados
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error;
}

// Usa o banco de dados
$conn->select_db($dbname);

// Cria tabela produtos
$sql = "CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    estoque INT NOT NULL DEFAULT 0
)";
if ($conn->query($sql) === TRUE) {
    echo "Table produtos created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}

// Cria tabela vendas
$sql = "CREATE TABLE IF NOT EXISTS vendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    formaPagamento VARCHAR(50) NOT NULL,
    valorTotal DECIMAL(10, 2) NOT NULL,
    dataVenda TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table vendas created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}

// Cria tabela vendasItens
$sql = "CREATE TABLE IF NOT EXISTS vendasItens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codVenda INT NOT NULL,
    codProduto INT NOT NULL,
    quantidade INT NOT NULL,
    valorItem DECIMAL(10, 2) NOT NULL,
    valorTotal DECIMAL(10, 2) AS (quantidade * valorItem) STORED,
    FOREIGN KEY (codVenda) REFERENCES vendas(id),
    FOREIGN KEY (codProduto) REFERENCES produtos(id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table vendasItens created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}

// Cria tabela financeiro
$sql = "CREATE TABLE IF NOT EXISTS financeiro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    data DATE NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table financeiro created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}

// Cria tabela usuario
$sql = "CREATE TABLE IF NOT EXISTS usuario (
    login VARCHAR(20) PRIMARY KEY,
    senha VARCHAR(255) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table usuario created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}

// Cria trigger para atualizar o estoque e registrar a venda no financeiro após uma venda
$sql = "DELIMITER //
CREATE TRIGGER atualizar_estoque_venda
AFTER INSERT ON vendasItens
FOR EACH ROW
BEGIN
    -- Atualizar estoque
    UPDATE produtos
    SET estoque = estoque - NEW.quantidade
    WHERE id = NEW.codProduto;

    -- Inserir registro no financeiro
    INSERT INTO financeiro (tipo, nome, valor, data)
    VALUES ('credito', NEW.codVenda, NEW.valorTotal, (SELECT dataVenda FROM vendas WHERE id = NEW.codVenda));
END;
//
DELIMITER ;";

if ($conn->multi_query($sql) === TRUE) {
    echo "Trigger created successfully\n";
} else {
    echo "Error creating trigger: " . $conn->error;
}

$conn->close();
?>