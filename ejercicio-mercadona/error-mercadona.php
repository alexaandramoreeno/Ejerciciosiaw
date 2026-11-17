<?php
$mensaje = 'La accion NO se ha ejecutado correctamente';

if(isset($_GET['error'])){
    $error = $_GET['error'];
    //solamente nos vendran desde store o destroy por ahora

    $mensajes=[
        'mercadona' => 'el mercadona no existe',
        'id' => 'no ha llegado el id del mercadona',
        'destroy' => 'No se ha podido borrar al mercadona',
        'datos' => 'Datos incompletos para dal de alta al mercadona',
        'store' => 'No se ha podido guardar al mercadona',
        'update' => 'No se ha podido editar al mercadona',
    ];
    if(isset($mensajes[$error])) {
        $mensaje = $mensajes[$error];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR</title>
</head>
<body>
    <?= $mensaje ?>
    <a href="create-mercadona.php">Seguir insertando</a>
    <a href="index-mercadona.php">Volver al listado</a>
</body>
</html>