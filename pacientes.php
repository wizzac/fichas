<!DOCTYPE HTML>
<html>
<?php
session_start();
include("header.php");

?>

<head>
	<title>Hielo by TEMPLATED</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

</head>
<body>

<!-- Header -->
<header id="header" class="alt">
	<a href="#menu" class="logo">Menu</a>
</header>

<!-- Nav -->
<nav id="menu">
	<ul class="links">
		<li><a href="login.php">Home</a></li>
		<li><a href="pacientes.php">Pacientes</a></li>
		<li><a href="consultas.php">Consultas</a></li>
	</ul>
</nav>

<!-- One -->
<section id="One" class="wrapper style3">
	<div class="inner">
		<header class="align-center">
			<h2>Pacientes</h2>
		</header>
	</div>
</section>

<!-- Two -->
<section id="two" class="wrapper style2">
	<div class="inner">
		<div class="box">
			<div class="content">
				<header class="align-center">
					<p class="tit-color">Lista de pacientes</p>
				</header>
            <div class="row">
                <a href="./crearPaciente.html" class="button btn ">Crear Nuevo</a>

                <br>
            </div>
                <br>
                <table>
					<thead>
					<td>Nombre / Apellido</td>
					<td>Telefono</td>
					<td>Editar</td>
					<td>Eliminar</td>
					</thead>
					<tbody>
					<tr>
						<td>Prueba ased</td>
						<td>444444</td>
						<td>boton</td>
						<td>boton</td>
					</tr>
					<tr>
						<td>Prueba ased</td>
						<td>444444</td>
						<td>boton</td>
						<td>boton</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<!-- Footer -->
<footer id="footer">
	<div class="container">
		<ul class="icons">
			<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
			<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
			<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
			<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
		</ul>
	</div>
	<div class="copyright">
		&copy; Untitled. All rights reserved.
	</div>
</footer>


</body>
</html>