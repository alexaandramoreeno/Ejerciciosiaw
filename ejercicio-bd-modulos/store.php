<?php
//esta página no debe de generar ningun contenido
//por eso los echos estan comentados

//esta pagina recibe los datos de un alumno nuevo
//los lee y los utiliza para insertarlo en la tabla de base de datos

// a esta pagina se llega con POST
//pretty vardump

//ejemplo visual de como nos llegan los datos 
/*echo ('<pre>' . var_export($_POST, true) . '</pre>');

//hacemos este echo para saber cómo nos llegan los datos desde create.php
echo('eres ' . $_POST["nombre"] . 
     ' tu apellido es ' . $_POST["apellido"] .
     ' tu fecha de nacimiento es ' . $_POST["fecha_nacimiento"] . 
     ' tu correo es ' . $_POST["correo"] . 
     ' tu nota de corte es ' . $_POST["nota_corte"]
    );
*/

//copiamos desde seeder2.php completo


//seeder: para poblar las tablas de mi aplicacion para
// disponer de datos iniciales 
// primero debemos conectarnos a la bd 

//Nos traemos las Variables de conexion para conectarnos 
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

//intentamos conectarnos a la bd 
//lo meteremos en una funcion para no estar copiando y pegando 

//hemos cambiado lo que les llega a las variables, poniendo que les va a 
//llegar informacion desde $_POST
try {
    $pdo = new PDO($dsn, $user, $password, $options);
    //vamos a hacer una sentencia preparada 
    // para evitar que nos hagan inyecciones sql 

    //evitamos error (no nos llegan los datos desde $post)
    //debemos comprobar si los datos llegan con un if
    //si no me llegan las variables , nos vamos a la pagina de error
    if(     !isset($_POST['nombre']) ||
            !isset($_POST['abreviatura']) || 
            !isset($_POST['creditos']) || 
            !isset($_POST['horassemanales'])){
        header('Location: error.php');
        exit;
    }

    
    $nombre = $_POST["nombre"];
    $abreviatura = $_POST["abreviatura"];
    $creditos = $_POST["creditos"];
    $horassemanales = $_POST["horassemanales"];


    //despues de ingresar los campos, vamos a comprobar si
    // los campos que son obligatorios los tenemos rellenos 
    // y si falta alguno que no es necesario le pondremos el valor null

    if($nombre == ""){
        $nombre == null;
    }
    if($abreviatura == ""){
        $abreviatura == null;
    }
    if($horassemanales == ""){
        $horassemanales == null;
    }
    
    //insertamos lo que haya en las variables de arriba 
    $sql = "insert into modulos 
        (nombre, abreviatura, creditos ,horassemanales)
         values (:nombre,
                 :abreviatura,
                 :creditos,
                 :horassemanales);";

    $sentencia_preparada = $pdo->prepare($sql);
    $datos = [
        //creamos las posiciones de los placeholders y asignar lo que tengamos
        //  en las variables
        'nombre' => $nombre,
        'abreviatura' => $abreviatura,
        'creditos' => $creditos,
        'horassemanales' => $horassemanales
    ];
    
    //conetamos con la bd y ejecutamos lo que hay dentro de las variables 
    //sql1-2-3, dentro tenemos una inserccion dentro de  cada una 
    //$pdo->exec($sql);
    $sentencia_preparada->execute($datos);
    //si lllegamos aqui quiere decir que todo está bien
    //redireccion a exito
    //echo ('Insert  ok');
    header('Location: exito.php');
} catch (Exception $error) {
    // echo ('Se ha producido un error, aquí mas informacion:');
    echo($error->getMessage());
    //si lllegamos aqui quiere decir que algo ha fallado
    //redireccion a error
    //header('Location: error.php');
}
?>