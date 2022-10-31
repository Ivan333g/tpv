<html> 
    <head>  
        <title>Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="./styles/cuenta.css" rel="stylesheet" type="text/css"> 
    </head> 
<body > 

<div class="container "> 
    <div class="row align-items-start">
        <div class="col centrador" >
        </div>
        <div class="col">
        </div>
        <div class="col">
        </div>
    </div> 
    <div class="row align-items-center ">
        <div class="col ">
        </div>
        <div class="col-5 bg-white border border-dark rounded m-3 p-3">
            <h1>compra</h1>
            <table class="table">
                <tr><th>Id</th><th>Nombre</th><th>Precio</th><th>Cantidad</th></tr>
            <?php     
            foreach($this->datos['cuenta']->getCuenta($_SESSION['mesa']) as $producto) {
                echo "<tr class='table-light'><td scope='col'>".$producto->id_producto."</td>";
                echo "<td >".$producto->nombre."</td>";
                echo "<td>".$producto->precio."€</td>";
                echo "<td>".$producto->unidades."</td>";
            } ?>
            </table> 
            <h4>Total a Pagar:
                <input type="number" value="<?php print $this->datos['cuenta']->getCoste($_SESSION['mesa']); ?>" id="total" readonly>
            </h4>
            <h4>Total pagado
                <input type="number" id="pagado">
            </h4>
            <h4>Cambio
                <input type="number" id="cambio" min="0" readonly>
            </h4>
            <form action='index.php' method='post'>
                    <span >
                        <input type="hidden" name="mesa" value='<?php echo $_SESSION['mesa']?>'>
                        <input type='submit' name='action' value='Pagar'/>
                    </span>
            </form>
            <br />
        </div>
        <div class="col">
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
<script>
    document.addEventListener("keyup",function(){
        var total=Number(document.querySelector("#total").value);
        var pagado=Number(document.querySelector("#pagado").value);
        let result=pagado-total;
        let cambio=document.querySelector("#cambio");
        cambio.value=result;
    });
</script>
</body>
</html>