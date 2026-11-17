<?php

if(!isset($_GET['id'])){
        header('Location: error-mercadona.php?error=id');
        exit;
}
//siempre me llega id porque si no llegara se iría con lo de arriba
$id = $_GET['id'];

//establecemos conexion con la bd copiamos de migration
$host     = 'mysql'; 
$db       = 'siga';
$user     = 'sigauser';
$password = 'sigapassword';
$charset  = 'utf8mb4';

//cadena de conexion
// Definición del Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opciones de configuración de PDO para manejo de errores y seguridad
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);

    $sql = "select * from mercadona where id = :id";
    //aquí escribimos una sentencia de sql normal 
    $sentencia_preparada = $pdo->prepare($sql);
    $datos = [
        'id' => $id
    ];
    $sentencia_preparada->execute($datos);

} catch (\Throwable $error) {
    echo ('Se ha producido un error, aquí mas informacion:');
    //echo ('<pre>' . var_export($error, true) . '</pre>');
    echo($error->getMessage());
    exit;
}
//vemos si tenemos un alumno o ninguno con el id que hemos puesto
$fila = $sentencia_preparada->fetch(); 
if($fila == null){ //si no hay fila significa que el id no es de nadie (null)
    header('Location: error-mercadona.php?error=mercadona');
    exit;
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de un mercadona</title>
</head>
<body>
    <h1>Datos de un mercadona</h1>
    <h2> <a href="index-mercadona.php">Volver</a></h2>
    <table border="1">
        <tr>
            <td>#</td>
            <td>Direccion:</td>
            <td>Localidad:</td>
            <td>Fecha apertura:</td>
            <td>Encargado:</td>
            <td>Telefono:</td>
            <td>Ingreso anual:</td>
        </tr>
            <tr>
                <td> <?= $fila['id'] ?> </td>
                <td> <?= $fila['direccion'] ?></td>
                <td> <?= $fila['localidad'] ?> </td>
                <td> <?= $fila['fecha_apertura'] ?> </td>
                <td> <?= $fila['encargado'] ?> </td>
                <td> <?= $fila['telefono'] ?> </td>
                <td> <?= $fila['ingreso_anual'] ?> </td>
                <td> 
                    <a href="edit-mercadona.php?id=<?= $fila['id']?>"> Editar </a>       
                    <a href="delete-mercadona.php?id=<?= $fila['id']?>"> Borrar </a>
                </td>
            </tr>
    </table>
</body>
</html>

<?php

?>