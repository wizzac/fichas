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
        <li><a href="./login.php">Home</a></li>
        <li><a href="./pacientes.php">Pacientes</a></li>
        <li><a href="./consultas.php">Consultas</a></li>
    </ul>
</nav>


<?php
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $paciente=$_POST['paciente_id'];
    $mysqli = new mysqli($ip, $userBase, $passBase, $nombreBase);
    if ($mysqli->connect_errno) {
        echo '<script>alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.")</script>';
        exit;
    }
    $sql = "select * from consultas where id=$id";
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
            <h2>Editar Consulta</h2>
        </header>

    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content container">
                <form action="./sql/updateConsulta.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo("$registro[id]"); ?>" name="id">

                    <div class="row">
                        <div class="col-md-6">
                            <label>Paciente:</label>
                            <select name="paciente_id">
                                <?php

                                $mysqli = new mysqli($ip, $userBase, $passBase, $nombreBase);
                                if ($mysqli->connect_errno) {
                                    echo '<script>alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.")</script>';
                                    exit;
                                }
                                $sql = "select * from pacientes where estado=1 ";
                                $resultado=$mysqli->query($sql);
                                foreach($resultado as $item) {
                                    if($item['id']==$paciente){
                                        echo("<option selected value='$item[id]'>$item[nombre]".' '."$item[apellido]</option>");
                                    }else{
                                        echo("<option value='$item[id]'>$item[nombre]".' '."$item[apellido]</option>");

                                    }
                                }
                                ?>

                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Fecha de Consulta:</label>
                            <input type="date" class="form-control" name="fecha_consulta" value="<?php  echo($registro['fecha_consulta']);?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Tipo de Consulta:</label>
                            <input type="text" class="form-control" name="tipo_consulta" value="<?php  echo($registro['tipo_consulta']);?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label>Notas: </label>
                            <textarea name="nota" ><?php  echo($registro['nota']);?></textarea>
                        </div>
                    </div>
                    <input type='hidden' name='location' value='../consultas.php'/>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="pull-right" name="submit" value="Editar">
                        </div>
                    </div>
                    <input type="hidden" name="location" value="../verConsultas.php">

                </form>
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