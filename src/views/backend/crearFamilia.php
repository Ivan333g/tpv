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
            background-color: 6C10AB;
            
        }

        #textoDescripcionProducto {
            height: 3rem;
            width: 40%;
        }
    </style>
</head>

<body>

    <form name="formulario" action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <br>
        <input type="hidden" name="id_familia" value="<?php echo (isset($this->datos['id_familia']) ? $this->datos['id_familia'] : "") ?>" >
        <span>Introduce el nombre de la familia: </span> <input type="text" name="nombre" value="<?php echo (isset($this->datos['nombre']) ? $this->datos['nombre'] : "") ?>" placeholder="Nombre de familia"> <br> <br>
        <span>Introduce una imagen:</span><input type="file" name="img" id="img"> <br> <br>
        <input type="hidden" name="tabla" value="Familia" />
        <input type="submit" name="action" value="<?php echo $this->datos['op'] ?>" /><br>
        <div style="text-align:center;">
            <span style="color:960505;"><?php if(isset($this->datos['error'])){ echo $this->datos['error']; }?></span>
        </div>
    </form>

</body>

</html>