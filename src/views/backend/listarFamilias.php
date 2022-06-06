<?php
include_once "menudesplegable.php";
?>
<style>
    table{
        background-color: #C299E5;
    }
</style>
<article>
    <table class="table table-striped">
        <thead>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Opciones</th>
        </thead>
        <?php

        foreach ($this->datos as $con) {
            if (strlen($con->id_familia) > 0) {
                echo "<tr>";
                echo "<td>" . $con->id_familia . "</td>";
                echo "<td>" . $con->nombre . "</td>";
                echo "<td><img src='./img/".$con->img."' class='img'></td>";
                echo "<td><a href='index.php?tabla=Familia&action=Editar&id_familia=".$con->id_familia."'>Editar</a><br>";
                echo "<a href='index.php?tabla=Familia&action=Eliminar&id_familia=".$con->id_familia."&img=".$con->img."'>Elminar</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</article>


