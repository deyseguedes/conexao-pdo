<?php
require_once '../config/database.php';

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

header("Location: ../index.php");
exit;