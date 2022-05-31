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
        <input type="hidden" name="id_usuario" value="<?php echo (isset($this->datos['id_usuario']) ? $this->datos['id_usuario'] : "") ?>" >
        <span>Introduce el nombre del usuario: </span> <input type="text" name="nombre" value="<?php echo (isset($this->datos['nombre']) ? $this->datos['nombre'] : "") ?>" placeholder="Nombre de Usuario"> <br> <br>
        <span>Introduce una password:</span><input type="text" name="password" value="<?php echo (isset($this->datos['password']) ? $this->datos['password'] : "") ?>" placeholder="Contraseña"><br> <br>
        <span>Introduce el rol:</span><select name='rol'>
                                    <option value='usuario'>Usuario</option>
                                    <option value='admin'>administrador</option>
        </select><br><br>
        <input type="hidden" name="tabla" value="Usuario" />
        <input type="submit" name="action" value="<?php echo $this->datos['op'] ?>" />

    </form>

</body>

</html>