<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = 'INSERT INTO products (name, description, price) VALUES (:name, :description, :price)';
    $statement = $pdo->prepare($sql);
    if ($statement->execute([':name' => $name, ':description' => $description, ':price' => $price])) {
        $message = 'Produto criado com sucesso';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Criar Produto</title>
</head>

<body>
    <h2>Criar Produto</h2>
    <?php if (!empty($message)): ?>
    <p><?= $message ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="name">Nome:</label><br>
        <input type="text" name="name" id="name"><br><br>
        <label for="description">Descrição:</label><br>
        <textarea name="description" id="description"></textarea><br><br>
        <label for="price">Preço:</label><br>
        <input type="number" step="0.01" name="price" id="price"><br><br>
        <button type="submit">Criar</button>
    </form>
</body>

</html>