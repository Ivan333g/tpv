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

    <form name="formulario" action="index.php" method="post" enctype="multipart/form-data" autocomplete="on">
        <br>
        <!---le envio el id anterior para que no se confunda con el nuevo id--->
        <input type="hidden" name="old_num" value="<?php echo (isset($this->datos['num_mesa']) ? $this->datos['num_mesa'] : "") ?>" >
        <span>Introduce el numero de mesa: </span> <input type="number" name="num_mesa" value="<?php echo (isset($this->datos['num_mesa']) ? $this->datos['num_mesa'] : "") ?>" placeholder="Numero mesa"> <br> <br>
        <span>Introduce el tipo de mesa: </span> <input type="text" name="tipo" value="<?php echo (isset($this->datos['tipo']) ? $this->datos['tipo'] : "") ?>" placeholder="Tipo de mesa"> <br> <br>
        <input type="hidden" name="tabla" value="Mesa" />
        <input type="submit" name="action" value="<?php echo $this->datos['op'] ?>" />

    </form>

</body>

</html>