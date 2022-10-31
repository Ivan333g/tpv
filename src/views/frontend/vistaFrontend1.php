<?php 
error_reporting(E_ALL);
// Y comprobamos que el usuario se haya autentificado y existe   
if (!isset($_SESSION['usuario'])) {
    // header('Location: ../index.php');
    // exit;
    die("Error - debe <a href='../../../index.php'>identificarse</a>.<br/>");
     exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <link rel="stylesheet" type="text/css" href="./styles/bootpantalla.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-image:url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg')">
    <div class="container bg-info">
        <div class="contenedor">
        <div class="col-7 mt-2 border border-dark rounded cuenta p-2" >
                <div id="productos">
                    <table class="table" id="tabla">
                    <form id='quitar' action='index.php' method='post'>
                        <?php
                        // Si la cesta está vacía, mostramos un mensaje
                        $cuenta_vacia = $this->datos['cuenta']->isEmpty($_SESSION['mesa']);
                        if ($cuenta_vacia) {
                            //echo "Usuario: ".$_SESSION['usuario'];
                            print '<tr><th>Cantidad</th><th>Producto</th><th>Precio</th><th>Opcion</th></tr>';
                        } else {
                            ?>
                        <!--<?php echo "<b>Usuario</b>: ".$_SESSION['usuario']; ?>--->
                       <tr><th>Cantidad</th><th>Producto</th><th>Precio</th><th>Opciones</th></tr>
                            <?php 
                            //aqui mostrara la cuenta dependiendo de la mesa    
                            foreach($this->datos['cuenta']->getCuenta($_SESSION['mesa']) as $producto) {
                                echo "<tr><td>".$producto->unidades."</td>";
                                echo "<td>".$producto->nombre."</td>";
                                echo "<td>".$producto->precio."</td>";
                                // echo "<form id='quitar' action='index.php' method='post'>";
                                // echo "<input type='hidden' name='id_producto' value='".$producto->id_producto."'/>";
                                // echo "<td><button class='btn btn-danger' name='action' value='Quitar'>Quitar</button></td></tr>";                       
                                echo "<td><a href='index.php?action=Quitar&id_producto=$producto->id_producto' class='btn btn-danger' >Quitar</a></td></tr>"; 
                            }
                            echo "</table>";
                            $cuenta_vacia = false;
                            echo "<div class='total'><h5>total: ".$this->datos['cuenta']->getCoste($_SESSION['mesa'])."€</h5></div>";
                        }   ?>
                    
                    </table>
                </div>
            </div>

            <div class="row row-cols-4">
                    <div class="m-3 border border-dark bordeBotones" style="text-align:center; padding-top:25px">
                        <h4 style="color:blue;">
                        <?php
                            echo "Mesa: ".$_SESSION['mesa'];
                        ?>
                        </h4>
                    </div>

                    <div class=" m-3 bg-secondary border border-dark bordeBotones">
                        <!---quitara todos los productos de la cuenta-->
                        <input type='hidden' name='mesa' value='<?php echo $_SESSION['mesa'];?>'/>
                        <input type='submit' class='grupBotones' name='action' value='Cancelar'/>
                    </div>

                    <div class=" m-3 bg-secondary border border-dark bordeBotones">
                    <!--ver porque hace que no funcione el quitar--->
                    <!-- <form action='index.php' method='post'> -->
                        <input type='submit' class='grupBotones' name='action' value='Finalizar' id='Comprar'>
                    <!-- </form> -->
                    </div>

                    <div class=" m-3 bg-secondary border border-dark bordeBotones">
                        cierre de caja
                    </div>

                    <div class=" m-3 bg-secondary border border-dark bordeBotones">
                        <!--orden en cocina prondra la cuenta en espera-->
                        <input type='hidden' name='mesa' value='<?php echo $_SESSION['mesa'];?>'/>
                        <input type='submit' class='grupBotones' name='action' value='Orden'/>
                    </div>

                    <div class="m-3 bg-secondary border border-dark bordeBotones">
                        <!---boton para desconectar el usuario-->
                        <input type='submit' class='grupBotones' name='action' value='Desconectar'/>
                    </div>
                </div>
        </div>

        <div class="contenedor2">
        <div class="col-11 border border-dark producto">
                <div class="ordenimg">
                    <?php
                    //aqui mostrara los productos para seleccionar y agregarlo a la cuenta
                    foreach ($this->datos['producto'] as $producto) {
                        echo "<p><form id_producto='{$producto->id_producto}' action='index.php' method='post'>";
                        echo "<input type='hidden' name='id_familia' value='" . $producto->id_familia . "'/>";
                        echo "<input type='hidden' name='producto' value='" . $producto->id_producto . "'/>";
                        echo "<input type='hidden' name='num_mesa' value='" . $_SESSION['mesa'] . "'/>";
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
                //aqui mostrar todas las familias a elegir
                foreach ($this->datos['familia'] as $familia) {
                    echo "<a href='index.php?action=VerProductos&id_familia=$familia->id_familia&nombre=$familia->nombre'
                    ><img src='./img/".$familia->img."' class='img'></a>";
                }
                ?> 
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
</body>

</html>