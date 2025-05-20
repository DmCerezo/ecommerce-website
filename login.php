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
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nombre = :user OR email = :user");
        $stmt->bindParam(':user', $user);
        $stmt->execute();
        $datos = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($datos && $datos['password'] === $pass) {
            $_SESSION['usuario'] = $datos['nombre'];
            header("Location: index.php");
            exit();
        } else {
            echo "<script>
                alert('Usuario o contraseña incorrectos');
                window.location.href = 'index.php';
            </script>";
        }
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit();
}
?>