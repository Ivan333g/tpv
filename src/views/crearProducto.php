<?php

include "menudesplegable.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            position: absolute;
            width: 50%;
            border: 2px solid black;
            top: 25%;
            padding: 2%;
            margin-left: 20%;
            background-color: white;
        }

        #textoDescripcionProducto {
            height: 3rem;
            width: 40%;
        }
    </style>
</head>

<body>

    <form name="formulario" action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">

<!-- rebisar para que puda agregar productos con su nombrecorto -->
        <br>
        <span>Introduce el precio del producto: </span> <input type="number" name="precio" value="<?php echo (isset($this->datos['precio']) ? $this->datos['precio'] : "") ?>" placeholder="Precio" > 

        <br> <br>
        <span>Introduce el nombre del producto: </span> <input type="text" name="nombre" value="<?php echo (isset($this->datos['nombre']) ? $this->datos['nombre'] : "") ?>" placeholder="Nombre"> <br> <br>

        <span>Introduce el descripcion del producto: </span> <input type="text" name="descripcion" value="<?php echo (isset($this->datos['descripcion']) ? $this->datos['descripcion'] : "") ?>" placeholder="Descripcion"> <br> <br>

        <span>Introduce la familia del producto: </span> <?php echo "<select name='id_familia'>"; 
            foreach ($this->datos['Familia'] as $prue => $value) {
                echo "<option value='$value->id_familia'>".$value->nombre."</option>";
            }

        echo "</select><br><br>"; ?>
        <span>Introduce la imagen del producto: </span> <input type="file" name="img" id="img"> <br> <br>
        <input type="hidden" name="tabla" value="Producto" />
        <input type="hidden" name="id_producto" value="<?php echo (isset($this->datos['id_producto']) ? $this->datos['id_producto'] : "") ?>" >
        <input type="submit" name="action" value="<?php echo $this->datos['op'] ?>" />

    </form>

</body>

</html>