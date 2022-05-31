<?php 
error_reporting(E_ALL);
// Y comprobamos que el usuario se haya autentificado y existe   
if (!isset($_SESSION['usuario'])) {
    // header('Location: ../index.php');
    // exit;
     die("Error - debe <a href='..\..\index.php'>identificarse</a>.<br/>");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pantalla</title>
    <link rel="stylesheet" type="text/css" href="./styles/bootpantalla.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<!-- <body class="bg-dark"> -->
<body style="background-image:url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg')">
    <div class="container bg-info">
        <div class="row mt-3">
            
            <div class="col-7 mt-2 border border-dark cuenta p-2" >
                <div id="productos">
                    <table class="table" id="tabla">
                        <?php
                        // Si la cesta está vacía, mostramos un mensaje
                        $cuenta_vacia = $this->datos['cuenta']->isEmpty();
                        if ($cuenta_vacia) {
                            print '<tr><th>Cantidad</th><th>Producto</th><th>Precio</th><th>Opcion</th></tr>';
                        } else {
                            ?>
                       <tr><th>Cantidad</th><th>Producto</th><th>Precio</th><th>Opciones</th></tr>
                            <?php     
                            foreach($this->datos['cuenta']->getProductos() as $producto) {
                                echo "<tr><td>".$producto->unidades."</td>";
                                echo "<td>".$producto->nombre."</td>";
                                echo "<td>".$producto->precio."</td>";
                                echo "<form id='quitar' action='index.php' method='post'>";
                                echo "<input type='hidden' name='id_producto' value='".$producto->id_producto."'/>";                          
                                echo "<td><input type='submit' class='btn btn-danger' name='action' value='Quitar'/></td></tr>";
                            }
                            echo "</table>";
                            $cuenta_vacia = false;
                            echo "<div class='total'><h5>total:".$this->datos['cuenta']->getCoste()."</h5></div>";
                        }   ?>
                    </table>
                </div>
            </div>

            <!-- cancelar
                orden a cocina
                finalizar-->
            <div class="col mt-2 border border-dark botones">
                <div class="row">

                    <div class="col-3 m-3 border border-dark bordeBotones">
                        cancelar
                    </div>

                    <div class="col-3 m-3 border border-dark bordeBotones">
                        elegir mesa
                    </div>

                    <div class="col-3 m-3 border border-dark bordeBotones">
                    <!--ver porque hace que no funcione el quitar--->
                    <form action='index.php' method='post'>
                        <input type='submit' class='grupBotones' name='action' value='Comprar'/>
                    </form>
                    </div>

                    <div class="col-3 m-3 border border-dark bordeBotones">
                        cierre de caja
                    </div>

                    <div class="col-3 m-3 border border-dark bordeBotones">
                        orden en cocina
                    </div>

                    <div class="col-3 m-3 border border-dark bordeBotones">
                        nose que mas
                    </div>
                </div>
            </div>
            
            <div class="col-11 border border-dark producto">
                <div class="ordenimg">
                    <?php
                    foreach ($this->datos['producto'] as $producto) {
                        echo "<p><form id_producto='{$producto->id_producto}' action='index.php' method='post'>";
                        echo "<input type='hidden' name='id_familia' value='" . $producto->id_familia . "'/>";
                        echo "<input type='hidden' name='producto' value='" . $producto->id_producto . "'/>";
                        echo "<input type='hidden' name='nombre' value='" . $producto->nombre . "'/>";
                        echo "<input type='hidden' name='precio' value='" . $producto->precio . "'/>";
                        echo "<button name='action' value='Añadir' class='botones2'><img src='./img/".$producto->img."' class='botonesi'></button>";
                        echo '</form>';
                        //ver porque esta invertido el id y el nombre
                        // echo "<a href='index.php?action=VerProductos&id_familia=$familia->id_familia&nombre=$familia->nombre'
                        // ><img src='./img/".$familia->img."' class='img'></a>";
                    }
                    ?> 
                </div>   
            </div>

            <div class="col border border-dark familia">
                <div class="ordenimg">
                <?php
                foreach ($this->datos['familia'] as $familia) {
                    //ver porque esta invertido el id y el nombre
                    echo "<a href='index.php?action=VerProductos&id_familia=$familia->id_familia&nombre=$familia->nombre'
                    ><img src='./img/".$familia->img."' class='img'></a>";
                }
                ?> 
                </div>
            </div>

        </div>
    </div>
    <script src="agregador.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
</body>
</html>