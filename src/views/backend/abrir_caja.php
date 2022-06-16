<?php
include "menudesplegable.php";
?>
<!DOCTYPE html>
<html lang="es">
<body>

    <form name="formulario" action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <br>
        <h4>Indicar con exactitud el monto</h4>
        <span>Saldo de apertura: </span>
        <input type="number" name="abrir" step="0.10" min="100"  placeholder="000" required> <br> <br>
        <input type="hidden" name="tabla" value="Cierre_caja" />
        <input type="hidden" name="id_cierre" value="<?php echo (isset($this->datos['id_cierre']) ? $this->datos['id_cierre'] : null) ?>">
        <input type="submit" name="action" value="<?php echo $this->datos['op'] ?>" /><br>
        <div style="text-align:center;">
            <span style="color:960505;"><?php if(isset($this->datos['error'])){ echo $this->datos['error']; }?></span>
        </div>
    </form>

</body>

</html>