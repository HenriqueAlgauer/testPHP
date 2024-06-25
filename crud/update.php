<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM products WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->execute([':id' => $id]);
$product = $statement->fetch(PDO::FETCH_OBJ);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = 'UPDATE products SET name=:name, description=:description, price=:price WHERE id=:id';
    $statement = $pdo->prepare($sql);
    if ($statement->execute([':name' => $name, ':description' => $description, ':price' => $price, ':id' => $id])) {
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Editar Produto</title>
</head>

<body>
    <h2>Editar Produto</h2>
    <form method="post">
        <label for="name">Nome:</label><br>
        <input type="text" name="name" id="name" value="<?= $product->name; ?>"><br><br>
        <label for="description">Descrição:</label><br>
        <textarea name="description" id="description"><?= $product->description; ?></textarea><br><br>
        <label for="price">Preço:</label><br>
        <input type="number" step="0.01" name="price" id="price" value="<?= $product->price; ?>"><br><br>
        <button type="submit">Atualizar</button>
    </form>
</body>

</html>