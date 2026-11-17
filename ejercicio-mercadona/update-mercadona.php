<?php
$host     = 'mysql'; 
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

    if(!isset($_POST['id']) ||
            !isset($_POST['direccion']) ||
            !isset($_POST['localidad']) ||
            !isset($_POST['fecha_apertura']) || 
            !isset($_POST['encargado']) || 
            !isset($_POST['telefono']) || 
            !isset($_POST['ingreso_anual'])){
        header('Location: error-mercadona.php');
        exit;
    }

    $id = $_POST["id"];
    $direccion = $_POST["direccion"];
    $localidad = $_POST["localidad"];
    $fecha_apertura = $_POST["fecha_apertura"];
    $encargado = $_POST["encargado"];
    $telefono = $_POST["telefono"];
    $ingreso_anual = $_POST["ingreso_anual"];

    if($telefono == ""){
        $telefono = null;
    }
    if($ingreso_anual == ""){
        $ingreso_anual = null;
    }
  

     $sql = "update mercadona set 
            direccion = :direccion,
            localidad = :localidad,
            fecha_apertura = :fecha_apertura,
            encargado = :encargado,
            telefono = :telefono,
            ingreso_anual = :ingreso_anual
            where id = :id";
    $sentencia_preparada = $pdo->prepare($sql);
    $datos = [
        'id' => $id,
        'direccion' => $direccion,
        'localidad' => $localidad,
        'fecha_apertura' => $fecha_apertura,
        'encargado' => $encargado,
        'telefono' => $telefono,
        'ingreso_anual' => $ingreso_anual
    ];

    
    $sentencia_preparada->execute($datos);
    header('Location: exito-mercadona.php?ok=update');
} catch (Exception $error) {
    //header('Location: error-mercadona.php?error=update');
    echo($error->getMessage());
}

?>