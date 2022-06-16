<?php
include_once "menudesplegable.php";
?>
<form action="index.php" method="post" enctype="multipart/form-data" autocomplete="on">
    <span>Buscar Cierre:</span>
    <input type="date" name="fecha" format="yyyy-mm-dd" required>
    <input type="hidden" name="tabla" value="Cierre_caja" />
    <input type="submit" name="action" value="Buscar" />
</form>
<article>
    <table class="table table-striped">
        <thead>
            <th scope="col">id</th>
            <th scope="col">Fecha</th>
            <th scope="col">Apertura</th>
            <th scope="col">Cierre</th>
            <th scope="col">Opcion</th>
        </thead>
        <?php

        foreach ($this->datos as $con) {
            if (strlen($con->id_cierre) > 0) {
                echo "<tr>";
                echo "<td>$con->id_cierre</td>";
                echo "<td>$con->fecha</td>";
                echo "<td>$con->abrir</td>";
                if($con->cierre==null){echo "<td>Sin Cerrar</td>";}else{echo "<td> $con->cierre </td>";}
                echo "<td><a href='index.php?tabla=Cierre_caja&action=Editar&id_cierre=".$con->id_cierre."'>Cerrar Caja</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</article>


