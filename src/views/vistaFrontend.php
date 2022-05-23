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
<body class="bg-dark">
    <div class="container bg-info">
        <div class="row mt-3">
            
            <div class="col-7 mt-2 border border-dark cuenta p-2" >
                <div id="productos">
                    <table class="table" id="tabla">
                       <tr><th>cantidad</th><th>producto</th><th>precio</th></tr>
                    </table>
                </div>
            </div>

            <!-- eliminar
                orden a cocina
                finalizar
                introducir codigo producto
                1234567890 -->
            <div class="col mt-2 border border-dark botones">
                <div class="border border-dark mol">
                    4
                </div>
            </div>
            
            <div class="col-11 border border-dark producto">
                <div class="ordenimg">
                    <button id="vino" class="botones2"><img src="./styles/vino.jpg" class="botonesi"></button>
                    <button id="boca" class="botones2"><img src="boca.jpg" class="botonesi"></button>
                    <button id="vino" class="botones2"><img src="vino.jpg" class="botonesi"></button>
                    <button id="boca" class="botones2"><img src="boca.jpg" class="botonesi"></button>
                    <button id="vino" class="botones2"><img src="vino.jpg" class="botonesi"></button>
                    <button id="boca" class="botones2"><img src="boca.jpg" class="botonesi"></button>
                    <button id="vino" class="botones2"><img src="vino.jpg" class="botonesi"></button>
                    <button id="boca" class="botones2"><img src="boca.jpg" class="botonesi"></button>
                    <button id="boca" class="botones2"><img src="boca.jpg" class="botonesi"></button>
                    <button id="vino" class="botones2"><img src="vino.jpg" class="botonesi"></button>
                    <button id="boca" class="botones2"><img src="boca.jpg" class="botonesi"></button>
                    <button id="vino" class="botones2"><img src="vino.jpg" class="botonesi"></button>
                    <button id="boca" class="botones2"><img src="boca.jpg" class="botonesi"></button>
                </div>   
            </div>

            <div class="col border border-dark familia">
                <div class="ordenimg">
                <!-- <a href="https://www.google.com/" ><img src="./styles/boca.jpg" class="img"><div style="text-align:50%; color:black" >poca</div></a>
                <a href="https://www.youtube.com/"><img src="vino.jpg" class="img"></a>
                <a href="https://www.google.com/"><img src="boca.jpg" class="img"></a>
                <a href="https://www.youtube.com/"><img src="vino.jpg" class="img"></a>
                <a href="https://www.google.com/"><img src="boca.jpg" class="img"></a>
                <a href="https://www.youtube.com/"><img src="vino.jpg" class="img"></a>
                <a href="https://www.google.com/"><img src="boca.jpg" class="img"></a>
                <a href="https://www.youtube.com/"><img src="vino.jpg" class="img"></a>
                <a href="https://www.google.com/"><img src="boca.jpg" class="img"></a>
                <a href="https://www.youtube.com/"><img src="vino.jpg" class="img"></a>
                <a href="https://www.google.com/"><img src="boca.jpg" class="img"></a>
                <a href="https://www.youtube.com/"><img src="vino.jpg" class="img"></a> -->
                <?php
                foreach ($this->datos as $familia) {
                    //ver porque esta invertido el id y el nombre
                    echo "<a href='index.php?tabla=Producto&action=Listar&id=$familia->id_familia&nombre=$familia->nombre'
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