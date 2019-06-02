<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<?php

include("./header.php");
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
        <li><a href="login.html">Home</a></li>
        <li><a href="pacientes.html">Pacientes</a></li>
        <li><a href="consultas.html">Consultas</a></li>
    </ul>
</nav>


<?php
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $mysqli = new mysqli($ip, $userBase, $passBase, $nombreBase);
    if ($mysqli->connect_errno) {
        echo '<script>alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.")</script>';
        exit;
    }
    $sql = "select * from pacientes where id=$id";
    $resultado=$mysqli->query($sql);
    $registro;
    foreach($resultado as $item){
        $registro=$item;
    }

}else{
    header("Location:./pacientes.php");
}


?>


<!-- One -->
<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">

            <h2><?php  echo($registro['nombre'].' '.$registro['apellido']);?></h2>
        </header>

    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content container">
                <div class="row">

                    <div class="col-md-6">
                        <label>Nombre:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php  echo($registro['nombre']);?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label>Apellido:</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Apellido" value="<?php  echo($registro['apellido']);?>" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>DNI:</label>
                        <input type="text" class="form-control" name="dni" placeholder="DNI" disabled value="<?php  echo($registro['dni']);?>">
                    </div>
                    <div class="col-md-6">
                        <label>Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" name="fecha_nac" disabled value="<?php  echo($registro['fecha_nac']);?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Telefono: </label>
                        <input type="text" class="form-control" name="telefono" placeholder="Telefono" disabled value="<?php  echo($registro['telefono']);?>">
                    </div>
                    <div class="col-md-6">
                        <label>Telefono 2: </label>
                        <input type="text" class="form-control" name="telefono2" placeholder="Telefono2" value="<?php  echo($registro['telefono2']);?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label>Direccion</label> <input type="text" class="form-control" name="direccion" placeholder="Direccion" value="<?php  echo($registro['direccion']);?>" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Referencia: </label>
                        <input type="text" class="form-control" name="referencia" placeholder="Referente" value="<?php  echo($registro['referencia']);?>" disabled>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <label>Notas: </label>
                        <textarea name="notas" disabled><?php  echo($registro['notas']);?></textarea>
                    </div>
                </div>
            </div>
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