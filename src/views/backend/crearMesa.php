<?php
include "menudesplegable.php";
?>
<!DOCTYPE html>
<html lang="es">

<body>

    <form name="formulario" action="index.php" method="post" enctype="multipart/form-data" autocomplete="on">
        <br>
        <!---le envio el id anterior para que no se confunda con el nuevo id--->
        <input type="hidden" name="old_num" value="<?php echo (isset($this->datos['num_mesa']) ? $this->datos['num_mesa'] : "") ?>" >
        <span>Introduce el numero de mesa: </span> 
        <input type="number" name="num_mesa" value="<?php echo (isset($this->datos['num_mesa']) ? $this->datos['num_mesa'] : "") ?>" placeholder="Numero mesa" required> <br> <br>
        <span>Introduce el tipo de mesa: </span> 
        <input type="text" name="tipo" value="<?php echo (isset($this->datos['tipo']) ? $this->datos['tipo'] : "") ?>" placeholder="Tipo de mesa" required> <br> <br>
        <input type="hidden" name="tabla" value="Mesa" />
        <input type="submit" name="action" value="<?php echo $this->datos['op'] ?>" />
        <div style="text-align:center;">
            <span style="color:red;"><?php if(isset($this->datos['error'])){ echo $this->datos['error']; }?></span>
        </div>
    </form>

</body>

</html>