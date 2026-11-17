<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ALTA DE MERCADONA</title>
    </head>
    <body>
        <h1>
            ALTA DE MERCADONA
            <br>
            <a href="index-mercadona.php">Volver al listado</a>

        </h1>
        <form action="store-mercadona.php" method="post"> <!--post: crear y editar -->
            <label for="direccion">Direccion:</label> <!--ponemos el id al que apunta-->
            <input type="text" 
                name="direccion" 
                id ="direccion" 
                value="" 
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
                value="" 
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
                value="" required>
            <br>
            <label for="encargado">Encargado:</label>
            <input type="encargado" 
                name="encargado" 
                id="encargado" 
                maxlength="150" 
                value = "" 
                placeholder="Introduce el encargado del mercadona">
            <br>
            <label for="telefono">Telefono:</label>
            <input type="text" 
                name="telefono" 
                id="telefono" 
                value="" 
                placeholder="Introduce el telefono" 
                maxlength="12" 
                step="0.01">
                <!--step: para poner decimales-->
            <br>
            <label for="ingreso_anual">Ingreso anual:</label>
            <input type="number" 
                name="ingreso_anual" 
                id="ingreso_anual" 
                value="" 
                placeholder="Introduce el ingreso anual" 
                maxlength="10" 
                step="0.001">
                <!--step: para poner decimales-->
                <br>
            <button type="submit"> Alta de MERCADONA</button>
        </form>
    </body>
</html>

