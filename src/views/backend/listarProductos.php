<?php
include_once "menudesplegable.php";
?>
<form action="index.php" method="post" enctype="multipart/form-data" autocomplete="on">
    <span>Buscar Producto:</span>
    <input type="text" name="nombre" placeholder="Buscar Producto" required>
    <input type="hidden" name="tabla" value="Producto" />
    <input type="submit" name="action" value="Buscar" />
</form>
<article>
    <table class="table table-striped">
        <thead>
            <th scope="col">id_producto</th>
            <th scope="col">precio</th>
            <th scope="col">nombre</th>
            <th scope="col">descripcion</th>
            <th scope="col">id_familia</th>
            <th scope="col">img</th>
            <th scope="col">opciones</th>
            </thead>
        <?php

        foreach ($this->datos as $con) {
            if (strlen($con->id_producto) > 0) {
                echo "<tr>";
                echo "<td>" . $con->id_producto . "</td>";
                echo "<td>" . $con-> precio. "</td>";
                echo "<td>" . $con->nombre . "</td>";
                echo "<td>" . $con->descripcion . "</td>";
                echo "<td>" . $con->id_familia . "</td>";
                echo "<td><img src='./img/".$con->img."' class='img'></td>";
                echo "<td><a href='index.php?tabla=Producto&action=Editar&id_producto=" .$con->id_producto."&precio=" .$con->precio."&nombre=".$con->nombre."&descripcion=".$con->descripcion."&id_familia=".$con->id_familia."'>Editar</a><br>";
                echo "<a href='index.php?tabla=Producto&action=Eliminar&id_producto=" .$con->id_producto."&img=".$con->img."'>Elminar</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</article>