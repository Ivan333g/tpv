<?php
include_once "menudesplegable.php";
?>
<style>
</style>
<article>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Nombre</td>
            <td>Imagen</td>
            <td>Opciones</td>
        </thead>
        <?php

        foreach ($this->datos as $con) {
            if (strlen($con->id_familia) > 0) {
                echo "<tr>";
                echo "<td>" . $con->id_familia . "</td>";
                echo "<td>" . $con->nombre . "</td>";
                echo "<td><img src='./img/".$con->img."' class='img'></td>";
                echo "<td><a href='index.php?tabla=Familia&action=Editar&codigo=" . $con->id_familia . "&nombre=" . $con->nombre ."'>Editar</a><br>";
                echo "<a href='index.php?tabla=Familia&action=Eliminar&codigo=" . $con->id_familia . "'>Elminar</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</article>


