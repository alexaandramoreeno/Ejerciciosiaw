<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>ALTA DE MODULOS</h1>
        <form action="store.php" method="post"> <!--post: crear y editar -->
            <!-- required: para saber que no podemos dejarlo nulo--> 
            <label for="nombre">Nombre:</label> <!--ponemos el id al que apunta-->
            <input type="text" 
                name="nombre" 
                id ="nombre" 
                value="" 
                placeholder="Introduce el nombre del módulo: " 
                required 
                minlength="2" 
                maxlength="100">
            <br>       
            <!-- ponemos apellido porque en la migracion tenemos puesto apellido
            debemos poner los mismos nombres y minlength y max igual que alli-->
            <label for="date">Abreviatura:</label>
            <input type="text" 
                name="abreviatura" 
                id="abreviatura" 
                value="" 
                placeholder="Introduce la abreviatura del módulo: " 
                required
                minlength="1" 
                maxlength="5">
            <br>
            <label for="creditos">Creditos:</label>
            <input type="number" 
                name="creditos" 
                id="creditos" 
                min="1"
                max="4"
                value = "" 
                step="0.01" 
                placeholder="Introduce la cantidad de creditos del módulo"
                reuqired>
            <br>
            <label for="horassemanales">Horas semanales:</label>
            <input type="number" 
                name="horassemanales" 
                id="horassemanales" 
                value="" 
                placeholder="Introduce las horas semanales del módulo:" 
                min="0.00" 
                max="10">
                <!--step: para poner decimales-->
            <br>
            <button type="submit"> Alta de modulo</button>
        </form>
    </body>
</html>

