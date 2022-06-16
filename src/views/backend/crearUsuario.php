<?php
include "menudesplegable.php";
?>
<!DOCTYPE html>
<html lang="es">
<body>

    <form name="formulario" action="index.php" method="post" enctype="multipart/form-data" autocomplete="on">
        <br>
        <input type="hidden" name="id_usuario" value="<?php echo (isset($this->datos['id_usuario']) ? $this->datos['id_usuario'] : "") ?>" >
        <span>Introduce el nombre del usuario: </span>
        <input type="text" name="nombre" value="<?php echo (isset($this->datos['nombre']) ? $this->datos['nombre'] : "") ?>" placeholder="Nombre de Usuario" required> <br> <br>
        <span>Introduce una password:</span>
        <input type="text" name="password" value="<?php echo (isset($this->datos['password']) ? $this->datos['password'] : "") ?>" placeholder="Contraseña" required><br> <br>
        <span>Introduce el rol:</span><select name='rol'>
                                    <option value='usuario'>Usuario</option>
                                    <option value='admin'>administrador</option>
        </select><br><br>
        <input type="hidden" name="tabla" value="Usuario" />
        <input type="submit" name="action" value="<?php echo $this->datos['op'] ?>" />
        <div style="text-align:center;">
            <span style="color:red;"><?php if(isset($this->datos['error'])){ echo $this->datos['error']; }?></span>
        </div>
    </form>

</body>

</html>