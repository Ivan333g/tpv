
<html> 
    <head>   
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">   
        <title>Ejemplo Unidad 5:Compra</title>   
        <link href="tienda.css" rel="stylesheet" type="text/css"> 
    </head> 
 
<body class="pagcesta"> 
 
<div id="contenedor">   
    <div id="encabezado">     
        <h1>compra</h1>   
    </div>   <div id="productos"> <?php     
    foreach($this->datos['cuenta']->getProductos() as $producto) {
        echo "<p><span class='codigo'>".$producto->id_producto."</span>";
        echo "<span class='nombre'>".$producto->nombre."</span>";
        echo "<span class='precio'>".$producto->precio."</span>";
        echo "<span class='precio'>".$producto->unidades."</span>";
        echo "<span class='precio'>".$producto->id_familia."</span></p>";
    } ?>
        <hr />
        <p><span class='pagar'>Precio total: <?php print $this->datos['cuenta']->getCoste(); ?> €</span></p>
        <div class="container">
        <div class="row justify-content-center">
        <h2>Total a Pagar:
            <input type="number" value="<?php print $this->datos['cuenta']->getCoste(); ?>" id="total" readonly>
        </h2>
        <h2>Total pagado
            <input type="number" id="pagado">
        </h2>
        <h2>Cambio
            <input type="number" id="cambio" readonly>
        </h2>
        </div>
    </div>

    <script>
        document.addEventListener("keyup",function(){
        var total=Number(document.querySelector("#total").value);
        var pagado=Number(document.querySelector("#pagado").value);
        let result=pagado-total;
        let cambio=document.querySelector("#cambio");
        cambio.value=result;
        });
    </script>
        <form action='index.php' method='post'>
            <p> 
                <span class='pagar'>
                    <input type='submit' name='action' value='Pagar'/>
                </span>
            </p>
        </form>
    </div>
    <br class="divisor" />
    <div id="pie">
        <form action='logoff.php' method='post'>
            <input type='submit' name='desconectar' value='Desconectar usuario 
                <?php echo $_SESSION['usuario']; ?>'/>
        </form>
    </div>
</div>
</body>
</html>