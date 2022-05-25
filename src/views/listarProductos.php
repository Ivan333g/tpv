<?php
include_once "menudesplegable.php";
?>
<style>
table{
    background-color: white;
}
    </style>

<article>
    <table border="1">
        <thead>
            <td>id_producto</td>
            <td>precio</td>
            <td>nombre</td>
            <td>descripcion</td>
            <td>id_familia</td>
            <td>img</td>
            <td>opciones</td>
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