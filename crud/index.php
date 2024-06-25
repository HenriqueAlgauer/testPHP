<?php
require 'db.php';
$sql = 'SELECT * FROM products';
$statement = $pdo->prepare($sql);
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tests</title>
</head>

<body>
    <h1>Crud com PHP</h1>
    <h2>Lista de Produtos</h2>
    <table border="2" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product): ?>
            <tr>
                <td><?= $product->id; ?></td>
                <td><?= $product->name; ?></td>
                <td><?= $product->description; ?></td>
                <td><?= $product->price; ?></td>
                <td>
                    <a href="update.php?id=<?= $product->id; ?>">Editar</a>
                    <a href="delete.php?id=<?= $product->id; ?>">Deletar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="create.php">Criar novo produto</a>
</body>

</html>