<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $carrito_id = (int) $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM carrito WHERE id = ?");
    $stmt->execute([$carrito_id]);
}

header("Location: cart.php");
exit();
