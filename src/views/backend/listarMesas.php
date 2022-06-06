<?php
include_once "menudesplegable.php";
?>
<style>
    table{
        background-color:#C299E5;
    }
</style>
<article>
    <table class="table table-striped">
        <thead>
            <th scope="col">Numero</th>
            <th scope="col">Tipo</th>
            <th scope="col">Opciones</th>
        </thead>
        <?php

        foreach ($this->datos as $con) {
            if (strlen($con->num_mesa) > 0) {
                echo "<tr>";
                echo "<td>" . $con->num_mesa . "</td>";
                echo "<td>" . $con->tipo . "</td>";
                echo "<td><a href='index.php?tabla=Mesa&action=Editar&num_mesa=".$con->num_mesa."'>Editar</a><br>";
                echo "<a href='index.php?tabla=Mesa&action=Eliminar&num_mesa=".$con->num_mesa."'>Elminar</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</article>


