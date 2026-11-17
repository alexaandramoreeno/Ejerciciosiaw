<?php
$host     = 'mysql'; 
$db       = '';
$user     = 'root';
$password = 'rootpassword';
$charset  = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
    echo('La conexión ha funcionado: <br>');

     $sql = "CREATE TABLE IF NOT EXISTS mercadona (
        id BIGINT unsigned AUTO_INCREMENT PRIMARY KEY, 
        direccion VARCHAR(150) NOT NULL,
        localidad VARCHAR(100) NOT NULL,
        fecha_apertura DATE NOT NULL,
        encargado VARCHAR(150) UNIQUE NOT NULL,
        telefono VARCHAR (12) NULL,
        ingreso_anual DECIMAL(10,3) default 0,
        CONSTRAINT uq_direccion_localidad UNIQUE (direccion, localidad)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    $pdo->exec($sql);
    echo "La tabla 'alumnos' se ha creado correctamente.";

} catch (\Throwable $error) {
    echo ('Se ha producido un error, aquí mas informacion:');
    //echo ('<pre>' . var_export($error, true) . '</pre>');
    echo($error->getMessage());
}
?>