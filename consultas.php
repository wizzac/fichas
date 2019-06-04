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
<style>
    .hov{
        cursor: pointer;
    }
</style>
<body style="background-color: #1a1a1a" >

<!-- Header -->
<header id="header" class="alt">
    <a href="#menu" class="logo">Menu</a>
</header>

<!-- Nav -->
<nav id="menu">
    <ul class="links">
        <li><a href="./login.php">Home</a></li>
        <li><a href="./pacientes.php">Pacientes</a></li>
        <li><a href="./consultas.php">Consultas</a></li>
    </ul>
</nav>

<!-- One -->
<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            <h2>Consultas</h2>
        </header>
    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <p class="tit-color">Lista de Consultas</p>
                </header>
                <div class="row">
                    <a href="./crearConsultas.php" class="button btn ">Crear nueva consulta</a>
                    <br>
                </div>
                <br>
                <table>
                    <thead>
                    <td>Nombre / Apellido</td>
                    <td>Fecha Nacimiento</td>
                    </thead>
                    <tbody>
                    <?php
                    $mysqli = new mysqli($ip, $userBase, $passBase, $nombreBase);
                    if ($mysqli->connect_errno) {
                        echo '<script>alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.")</script>';
                        exit;
                    }
                    $sql = "select * from pacientes where estado=1";
                    $resultado=$mysqli->query($sql);
                    foreach($resultado as $registro){
                        echo "<tr>
                                <form id='form_ver$registro[id]' method='post' action='./verConsultas.php'>
                                   <input type='hidden' name='id' value='$registro[id]' />
						           <td><a id='link_ver$registro[id]' href='#'>$registro[nombre] $registro[apellido]</a> </td>
						        </form>
						        <script>
                                    $('#link_ver$registro[id]').click(function(){
                                        $('#form_ver$registro[id]').submit();
                                    });
                                </script> 
						        <td>$registro[fecha_nac]</td>
						     </tr>";

                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

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



<script>

</script>
</html>