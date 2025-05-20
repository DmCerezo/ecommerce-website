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

        // Validación básica
        if (empty($nombre) || empty($email) || empty($password)) {
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
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password, fecha_registro)
                                VALUES (:nombre, :email, :password, NOW())");

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password); // En producción, usar password_hash

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
