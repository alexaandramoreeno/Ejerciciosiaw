<?php

/*Variables de conexion*/ 
$host     = 'mysql'; // tenemos host porque usamos docker, normalmente se usa localhost
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

/* Si la ejecucion dentro del bloque try falla,
se llama al bloque del catch y se le pasa la 
informacion del error (php)*/

try {
    $pdo = new PDO($dsn, $user, $password, $options);
    echo('La conexión ha funcionado: <br>');
// autoincrement: que va incrementando de uno en uno, 
    $sql = "CREATE TABLE IF NOT EXISTS modulos (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nombre VARCHAR(100) NOT NULL unique,
       abreviatura VARCHAR(5) NOT NULL unique,
       creditos decimal(4,2) NOT NULL,
       horassemanales smallint
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    //aquí escribimos una sentencia de sql normal 


    // 3. Ejecutar la sentencia en el servidor
    //$pdo = conectamos con la base de datos y ejecutamos la sentencia sql. 
    // Si funciona correctamente nos saltará el mensaje de que todo está correcto, sino nos vamos al catch y hacemos lo que tengamos dentro.

    $pdo->exec($sql);
    echo "La tabla 'modulos' se ha creado correctamente.";

} catch (\Throwable $error) {
    echo ('Se ha producido un error, aquí mas informacion:');
    //echo ('<pre>' . var_export($error, true) . '</pre>');
    echo($error->getMessage());
}

?>


