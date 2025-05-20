<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = 1; // fijo por ahora
    $producto_id = (int) $_POST['producto_id'];
    $precio_unitario = (float) $_POST['precio'];

    try {
        // Verificar si ya existe el producto en el carrito
        $stmt = $conn->prepare("SELECT * FROM carrito WHERE usuario_id = ? AND producto_id = ?");
        $stmt->execute([$usuario_id, $producto_id]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($item) {
            // Si ya existe, actualizar cantidad y total
            $nuevaCantidad = $item['cantidad'] + 1;
            $nuevoTotal = $precio_unitario * $nuevaCantidad;
            $update = $conn->prepare("UPDATE carrito SET cantidad = ?, total = ? WHERE id = ?");
            $update->execute([$nuevaCantidad, $nuevoTotal, $item['id']]);
        } else {
            // Si no existe, insertar nuevo
            $total = $precio_unitario;
            $insert = $conn->prepare("INSERT INTO carrito (usuario_id, producto_id, cantidad, precio_unitario, total) VALUES (?, ?, ?, ?, ?)");
            $insert->execute([$usuario_id, $producto_id, 1, $precio_unitario, $total]);
        }

        header("Location: cart.php");
        exit();
    } catch (PDOException $e) {
        echo "Error al agregar al carrito: " . $e->getMessage();
    }
} else {
    header("Location: shop.php");
    exit();
}
