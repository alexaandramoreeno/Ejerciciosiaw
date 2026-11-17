<?php
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

    $sql = "select * from mercadona";
    //aquí escribimos una sentencia de sql normal 
    $sentencia_preparada = $pdo->prepare($sql);
    $sentencia_preparada->execute();
    // 3. Ejecutar la sentencia en el servidor
    //$pdo = conectamos con la base de datos y ejecutamos la sentencia sql. 


} catch (\Throwable $error) {
    echo ('Se ha producido un error, aquí mas informacion:');
    //echo ('<pre>' . var_export($error, true) . '</pre>');
    echo($error->getMessage());
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de mercadonas</title>
</head>
<body>
    <h1>Lista de mercadonas</h1>
    <h2> <a href="create-mercadona.php">añadir mercadona</a></h2>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Direccion</td>
            <td>Localidad</td>
        </tr>
        <?php
        while($fila = $sentencia_preparada->fetch()) {
            ?>
            <tr>
                <td> <?= $fila['id'] ?> </td>
                <td> <?= $fila['direccion']?> </td>
                <td> <?= $fila['localidad'] ?></td>
                <td> 
                    <a href="show-mercadona.php?id=<?= $fila['id'] ?>"> Ver </a>
                    <a href="edit-mercadona.php?id=<?= $fila['id'] ?>"> Editar </a>
                    <a href="delete-mercadona.php?id=<?= $fila['id']?>"> Borrar </a>
                </td>
            </tr>
        
        <?php
        }
        ?>
    </table>
    <?php
    
    ?>
</body>
</html>