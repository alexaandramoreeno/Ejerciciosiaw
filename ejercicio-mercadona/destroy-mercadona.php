<?php
$host     = 'mysql'; // tenemos host porque usamos docker, normalmente se usa localhost
$db       = 'siga';
$user     = 'sigauser';
$password = 'sigapassword';
$charset  = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
    
    if(!isset($_POST['id'])){
        header('Location: error-mercadona.php?error=id');
        exit;
    }
    $id = $_POST['id'];

    $sql = "delete from mercadona where id = :id ";
    $sentencia_preparada = $pdo->prepare($sql);
    $datos = [
        'id' => $id,
    ];

    $sentencia_preparada->execute($datos);
    header('Location: exito-mercadona.php?ok=destroy');
} catch (Exception $error) {
    header('Location: error-mercadona.php?error=destroy');
}
?>