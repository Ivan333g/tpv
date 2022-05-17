<?php
error_reporting(E_ALL);
// Y comprobamos que el usuario se haya autentificado y existe   
if (!isset($_SESSION['usuario'])) {
     die("Error - debe <a href='..\..\index.php'>identificarse</a>.<br/>");
}
//con esto comprobamos que solo puede estar en el backend los administradores
//ya que menudesplegable.php es incluida en la mayoria de phps

echo "bienevenido al back :C";

?>