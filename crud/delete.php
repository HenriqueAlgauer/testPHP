<?php
require 'db.php';
$id = $_GET['id'];

$sql = 'DELETE FROM products WHERE id=:id';
$statement = $pdo->prepare($sql);
if ($statement->execute([':id' => $id])) {
    header("Location: index.php");
}
?>