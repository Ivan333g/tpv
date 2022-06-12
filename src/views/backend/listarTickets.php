<?php
include_once "menudesplegable.php";
?>
<style>
    table{
        background-color:#C299E5;
    }
</style>
<article>
    <table class="table table-striped" id="tabla">
        <thead>
            <th scope="col">Id ticket</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Mesa</th>
            <th scope="col">Opciones</th>
        </thead>
        <?php

        foreach ($this->datos['ticket'] as $con) {
            if (strlen($con->id_ticket) > 0) {
                echo "<tr>";
                echo "<td>" . $con->id_ticket . "</td>";
                echo "<td>" . $con->fecha . "</td>";
                echo "<td>" . $con->hora . "</td>";
                echo "<td>" . $con->num_mesa . "</td>";
                echo "<input type='hidden' id='H$con->id_ticket' value='false'>";
                echo "<td><button id='$con->id_ticket'>Detalles</button></td>";
                echo "</tr>";
                echo "<tr><td id='T$con->id_ticket' colspan='5'></td></tr>";

                echo "<script>";
                echo "document.getElementById('$con->id_ticket').addEventListener('click',function(){
                    if(document.getElementById('H$con->id_ticket').value=='false'){
                        let texto='';
                        document.getElementById('H$con->id_ticket').value='true';
                        let td=document.getElementById('T$con->id_ticket');";
                        foreach ($this->datos['linea_ticket']->getLineaTicket($con->id_ticket) as $line) {
                echo "texto+='<b>Id Producto:</b>$line->id_producto <b>cantidad:</b>$line->cantidad <b>codigo Linea:</b>".$line->id_linea_ticket." <br>';";
                        }
                echo "td.innerHTML=texto;
                    }else{
                            document.getElementById('H$con->id_ticket').value='false';
                            let td=document.getElementById('T$con->id_ticket');
                            td.innerText='';
                        
                        }
                    });";
                echo "</script>";
            }
        }
        ?>
         
    </table>
</article>

