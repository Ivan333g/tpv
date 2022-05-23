<html>
	<head>
		<title>Tpv Interno</title>
		<style type="text/css">
			.img{ 
    margin:5px;       
    width:150px;
    height:120px;
}
			* {
				margin:0px;
				padding:0px;
			}
			
			#header {
				margin:auto;
				width:500px;
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav {
				width:500px; /*Le establecemos un ancho*/
				margin:0 auto; /*Centramos automaticamente*/
			}
 
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#000;
				color:#fff;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#434343;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
			
		</style>
	</head>
	<body>
		<div id="header">
			<nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
				<ul class="nav">
					<li><a href="index.php">salir</a></li>
					<li><a href="">Agregar</a>
						<ul>
							<li><a href="index.php?tabla=Producto&action=Crear">Productos</a></li>
							<li><a href="index.php?tabla=Familia&action=Crear">Familias</a></li>
						</ul>
					</li>
					<li><a href="">listar</a>
						<ul>
						<li><a href="index.php?tabla=Producto&action=Listar">Productos</a></li>
							<li><a href="index.php?tabla=Familia&action=Listar">Familias</a></li>
 
						</ul>
					</li>
					<!-- <li><a href="">Tiendas</a>
						<ul>
							<li><a href="index.php?tabla=Tienda&action=Crear">Crear</a></li>
							<li><a href="index.php?tabla=Tienda&action=Listar">Listar</a></li>
                            <li><a href="index.php?tabla=Tienda&action=Stock">Stock</a></li>
						</ul>
					</li>                                         -->
					<li><a href="index.php">Acerca de</a>
					</li>

				</ul>
			</nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
		</div>
		<br>
		<br>
		<br>
		
	</body>
</html>