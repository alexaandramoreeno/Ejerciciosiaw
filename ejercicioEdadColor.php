<!--archivo a parte: deberes dos, agregar a cada linea su edad, si la edad 
del alumno es par en azul, si la edad del alumno es impar en verde--> 
<?php $alumnos = [
    ['Atienza Bermúdez, Alejandro','m','19'],
    ['Calderer Sanchez, Lucas','m','23'],
    ['Cano Merino, Carlos','m','19'],
    ['Chari, Abdelali','m','19'],
    ['García Zarco, Francisco José','m','22'],
    ['Gómez Pérez, Samuel','m','20'],
    ['Iáñez Navarro, Daniel','m','20'],
    ['López Lasheras, Alan','m','19'],
    ['Maldonado Cabezas, Francisco','m','20'],
    ['Martín Arias, Carlos','m','19'],
    ['Moreno González, Alexandra','f','19'],
    ['Muñoz Moreno, Elisabet','f','19'],
    ['Ourhzif, Aymane','m','19'],
    ['Sánchez Ortiz, Emilio David','m','19'],
    ['Sánchez Rodríguez, Beatriz','f','24'],
    ['Torres Gómez, Ignacio','m','19'],
    ['Uréndez Jiménez, Alba','f','20'],
    ['Uribe Aranda, Francisco','m','19'],
    ['Velasco Clavero, Pablo','m','21']
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
            <td>Edad</td>
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

                <?php if ($alumnoGenero[2]%2 == 0){ ?>

                    <td style="background-color:lightblue"><?= $alumnoGenero[2] ?></td>

                <?php }else{ ?>

                    <td style="background-color:lightgreen"><?= $alumnoGenero[2]?></td>
                <?php } ?>

            </tr>

            <?php
        };
        ?>
    </table>


    
</body>
</html>