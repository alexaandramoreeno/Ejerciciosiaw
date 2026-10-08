<!--deberes: si el genero es M, escribir la fila en verde, si el genero es F, 
escribir la fila en azul. Subir a github en un repositorio y mandar enlace a archivo-->
<?php $alumnos = [
    ['Atienza Bermúdez, Alejandro','m'],
    ['Calderer Sanchez, Lucas','m'],
    ['Cano Merino, Carlos','m'],
    ['Chari, Abdelali','m'],
    ['García Zarco, Francisco José','m'],
    ['Gómez Pérez, Samuel','m'],
    ['Iáñez Navarro, Daniel','m'],
    ['López Lasheras, Alan','m'],
    ['Maldonado Cabezas, Francisco','m'],
    ['Martín Arias, Carlos','m'],
    ['Moreno González, Alexandra','f'],
    ['Muñoz Moreno, Elisabet','f'],
    ['Ourhzif, Aymane','m'],
    ['Sánchez Ortiz, Emilio David','m'],
    ['Sánchez Rodríguez, Beatriz','f'],
    ['Torres Gómez, Ignacio','m'],
    ['Uréndez Jiménez, Alba','f'],
    ['Uribe Aranda, Francisco','m'],
    ['Velasco Clavero, Pablo','m']
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


 <table border="1">
        <tr>
            <td>#</td>
            <td>Alumno</td>
            <td>Genero</td>
        </tr>
        <?php
        $genero = null;
        foreach ($alumnos as $indice => $alumnoGenero) {
            ?>
            <tr>
                <td><?= $indice ?></td>
                <td><?= $alumnoGenero[0] ?></td>
                
                <?php
                    if($alumnoGenero[1] == "m"){

                ?>
                    <td style="background-color:lightgreen" ><?= $alumnoGenero[1] ?></td>

                    
                <?php }else { ?>

                    <td style="background-color:lightblue" ><?= $alumnoGenero[1] ?></td>

                <?php } ?> 

            </tr>

            <?php
        };
        ?>
    </table>
    
</body>
</html>


