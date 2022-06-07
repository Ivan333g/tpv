
<?php     // Recuperamos la información de la sesión     

// Y la eliminamos     
session_destroy();     
?>
<form action="index.php" method="post">
    <input type="submit" value="Login">
</form>