<?php
include_once "menudesplegable.php";
?>
<form action="index.php" method="post" enctype="multipart/form-data" autocomplete="on">
    <span>Buscar Usuario:</span>
    <input type="text" name="nombre" placeholder="Buscar Usuario" required>
    <input type="hidden" name="tabla" value="Usuario" />
    <input type="submit" name="action" value="Buscar" />
</form>
<article>
    <table class="table table-striped">
        <thead>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">rol</th>
            <th scope="col">Opciones</th>
        </thead>
        <?php

        foreach ($this->datos as $con) {
            if (strlen($con->id_usuario) > 0) {
                echo "<tr>";
                echo "<td>" . $con->id_usuario . "</td>";
                echo "<td>" . $con->nombre . "</td>";
                echo "<td>".$con->rol."</td>";
                echo "<td><a href='index.php?tabla=Usuario&action=Editar&id_usuario=".$con->id_usuario."'>Editar</a><br>";
                echo "<a href='index.php?tabla=Usuario&action=Eliminar&id_usuario=".$con->id_usuario."'>Elminar</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</article>


