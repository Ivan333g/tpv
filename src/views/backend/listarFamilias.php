<?php
include_once "menudesplegable.php";
?>
<form action="index.php" method="post" enctype="multipart/form-data" autocomplete="on">
    <span>Buscar Familia:</span>
    <input type="text" name="nombre" placeholder="Buscar familia" required>
    <input type="hidden" name="tabla" value="Familia" />
    <input type="submit" name="action" value="Buscar" />
</form>
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


