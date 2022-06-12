<?php 
error_reporting(E_ALL);
// Y comprobamos que el usuario se haya autentificado y existe   
if (!isset($_SESSION['usuario'])) {
    // header('Location: ../index.php');
    // exit;
     die("Error - debe <a href='../../../index.php'>identificarse</a>.<br/>");
     exit;
}
?>
<html>
	<head>
		<title>Tpv Interno</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./styles/menudesple.css">
        <link rel="icon" href="icon.jpg">
		<style type="text/css">
			.img{ 
                margin:5px;       
                width:150px;
                height:120px;
            }
            .body{background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                height: 100%;
                font-family: 'Numans', sans-serif;
                z-index:1;
            }
        </style>
    </head>
<body class="body">
<div id="container">
    <nav>
        <ul>
            <!-- Primer Menu Desplegable -->
            <!---podra dar un ejemplo de como crear un producto--->
            <li><a href="index.php?tabla=Producto&action=Crear">Crear <i class="down"></i></a>
            <ul>
                <li><a href="index.php?tabla=Producto&action=Crear">Productos</a></li>
				<li><a href="index.php?tabla=Familia&action=Crear">Familias</a></li>
				<li><a href="index.php?tabla=Usuario&action=Crear">Usuarios</a></li>
				<li><a href="index.php?tabla=Mesa&action=Crear">Mesas</a></li>
            </ul>        
            </li>
            <li><a href="index.php?tabla=Producto&action=Listar">listar <i class="down"></i></a>
             <!-- Primer Menu Desplegable -->
            <ul>
                <li><a href="index.php?tabla=Producto&action=Listar">Productos</a></li>
				<li><a href="index.php?tabla=Familia&action=Listar">Familias</a></li>
				<li><a href="index.php?tabla=Usuario&action=Listar">Usuarios</a></li>
				<li><a href="index.php?tabla=Mesa&action=Listar">Mesas</a></li>
                <li><a href="index.php?tabla=Ticket&action=Listar">Tickets</a></li>
               <!-- Segudo Menu Desplegable -->
                <!-- <ul>
                    <li><a href="#">WhiteBoards</a></li>
                    <li><a href="#">Presentaciones</a></li>
                    <li><a href="#">Otros</a> -->
                         <!-- Tercer Menu Desplegable -->
                        <!-- <ul>
                            <li><a href="#">Stuff</a></li>
                            <li><a href="#">Things</a></li>
                            <li><a href="#">Other Stuff</a></li>
                        </ul>
                    </li>
                </ul> -->
            <!-- </li>-->
            </ul>
                <li><a href="index.php?action=Desconectar">Salir</a></li>
            </li>
           
        </ul>
    </nav>
</div>