<?php
$mensaje = 'La accion se ha ejecuado correctamente';
if(isset($_GET['ok'])){
    $ok = $_GET['ok'];
    //solamente nos vendran desde store o destroy por ahora

    $mensajes=[
        'destroy' => 'se ha borrado correctamente',
        'store' => 'se ha insertado correctamente <a href="index-mercadona.php">Volver al listado</a>',
        'update' => 'se ha editado correctamente',
    ];
    if(isset($mensajes[$ok])) {
        $mensaje = $mensajes[$ok];
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXITO</title>
</head>
<body>
    <?= $mensaje ?>
    <a href="create-mercadona.php">Seguir insertando</a>
    <a href="index-mercadona.php">Volver al listado</a>
    
</body>
</html>


