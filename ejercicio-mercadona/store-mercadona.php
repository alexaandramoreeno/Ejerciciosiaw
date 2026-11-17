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

    if(!isset($_POST['direccion']) ||
            !isset($_POST['localidad']) ||
            !isset($_POST['fecha_apertura']) || 
            !isset($_POST['encargado']) || 
            !isset($_POST['telefono']) ||
            !isset($_POST['ingreso_anual'])) {
        header('Location: error-mercadona.php');
        exit;
    }

    $direccion = $_POST["direccion"];
    $localidad = $_POST["localidad"];
    $fecha_apertura = $_POST["fecha_apertura"];
    $encargado = $_POST["encargado"];
    $telefono = $_POST["telefono"];
    $ingreso_anual = $_POST["ingreso_anual"];


    
    if($direccion == ""){
        $direccion == null;
    }
    if($localidad == ""){
        $localidad == null;
    }
    if($fecha_apertura == ""){
        $fecha_apertura == null;
    }
    if($encargado == ""){
        $encargado == null;
    }
    
   
    $sql = "insert into mercadona 
        (direccion, localidad, fecha_apertura, encargado ,telefono ,ingreso_anual)
         values (:direccion,
                 :localidad,
                 :fecha_apertura,
                 :encargado,
                 :telefono,
                 :ingreso_anual);";
    $sentencia_preparada = $pdo->prepare($sql);
    $datos = [

        'direccion' => $direccion,
        'localidad' => $localidad,
        'fecha_apertura' => $fecha_apertura,
        'encargado' => $encargado,
        'telefono' => $telefono,
        'ingreso_anual' => $ingreso_anual
    ];

    $sentencia_preparada->execute($datos);
    //si lllegamos aqui quiere decir que todo está bien
    //redireccion a exito
    //echo ('Insert  ok');
    header('Location: exito-mercadona.php');
} catch (Exception $error) {

 echo($error->getMessage());
   
    header('Location: error-mercadona.php');
}
?>