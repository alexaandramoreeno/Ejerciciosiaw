
<?php
// hacemos esto para obtener mi alumno actual
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
        <title>EDICION DE MERCADONA</title>
    </head>
    <body>
        <h1>
            EDICION DE MERCADONA
            <br>
            <a href="index-mercadona.php">Volver al listado</a>

        </h1>
        <form action="update-mercadona.php" method="post"> <!--post: crear y editar -->
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="direccion">Direccion:</label> <!--ponemos el id al que apunta-->
            <input type="text" 
                name="direccion" 
                id ="direccion" 
                value="<?= $fila['direccion'] ?>" 
                placeholder="Introduce la direccion" 
                required 
                minlength="2" 
                maxlength="150">
            <br>
            <!-- required: para saber que no podemos dejarlo nulo-->
            <label for="localidad">Localidad:</label>
            <input type="text" 
                name="localidad" 
                id ="localidad" 
                value="<?= $fila['localidad'] ?>" 
                placeholder="Introduce la localidad" 
                required 
                minlength="2" 
                maxlength="100"> 
            <br>       
            <!-- ponemos apellido porque en la migracion tenemos puesto apellido
            debemos poner los mismos nombres y minlength y max igual que alli-->
            <label for="date">Fecha Apertura:</label>
            <input type="date" 
                name="fecha_apertura" 
                id="fecha_apertura" 
                value="<?= $fila['fecha_apertura'] ?>" required>
            <br>
            <label for="encargado">Encargado:</label>
            <input type="encargado" 
                name="encargado" 
                id="encargado" 
                maxlength="150" 
                value = "<?= $fila['encargado'] ?>" 
                placeholder="Introduce el encargado del mercadona">
            <br>
            <label for="telefono">Telefono:</label>
            <input type="text" 
                name="telefono" 
                id="telefono" 
                value="<?= $fila['telefono'] ?>" 
                placeholder="Introduce el telefono" 
                maxlength="12" 
                step="0.01">
                <!--step: para poner decimales-->
            <br>
            <label for="ingreso_anual">Ingreso anual:</label>
            <input type="number" 
                name="ingreso_anual" 
                id="ingreso_anual" 
                value="<?= $fila['ingreso_anual'] ?>" 
                placeholder="Introduce el ingreso anual" 
                maxlength="10" 
                step="0.001">
                <!--step: para poner decimales-->
                <br>
            <button type="submit"> Editar MERCADONA</button>
        </form>
    </body>
</html>