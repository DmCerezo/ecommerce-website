<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'somnia';

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8mb4");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $telefono = trim($_POST['telefono']);
        $direccion_facturacion = trim($_POST['direccion_facturacion']);
        $direccion_entrega = trim($_POST['direccion_entrega']);
        $codigo_postal = trim($_POST['codigo_postal']);

        // Validación básica
        if (empty($nombre) || empty($email) || empty($password) ||
            empty($telefono) || empty($direccion_facturacion) ||
            empty($direccion_entrega) || empty($codigo_postal)) {
            echo "<script>alert('Todos los campos son obligatorios'); window.location.href='index.php';</script>";
            exit();
        }

        // Verificar si el usuario o email ya existe
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nombre = :nombre OR email = :email");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<script>alert('El usuario o email ya existe'); window.location.href='index.php';</script>";
            exit();
        }

        // Insertar el usuario
        $stmt = $conn->prepare("
            INSERT INTO usuarios (
                nombre, email, password, telefono,
                direccion_facturacion, direccion_entrega, codigo_postal, fecha_registro
            ) VALUES (
                :nombre, :email, :password, :telefono,
                :direccion_facturacion, :direccion_entrega, :codigo_postal, NOW()
            )
        ");

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password); // Recomendado: usar password_hash
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':direccion_facturacion', $direccion_facturacion);
        $stmt->bindParam(':direccion_entrega', $direccion_entrega);
        $stmt->bindParam(':codigo_postal', $codigo_postal);

        $stmt->execute();

        $_SESSION['usuario'] = $nombre;
        header("Location: index.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>
