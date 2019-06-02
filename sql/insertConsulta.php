<?php
include("../header.php");


if (isset($_POST['submit'])) {
    $paciente = $_POST['paciente_id'];
    $nota = $_POST['nota'];
    $tipo_consulta=$_POST['tipo_consulta'];
    $fecha_consulta=$_POST['fecha_consulta'];

    if (isset($_POST['location'])){
        $location = $_POST['location'];
    }

    $usuario=$_COOKIE['usuarioId'];

    $mysqli = new mysqli($ip, $userBase, $passBase, $nombreBase);
    if ($mysqli->connect_errno) {
        echo '<script>alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.")</script>';
        exit;
    }

    $sql = "INSERT INTO consultas(paciente_id,nota,tipo_consulta,fecha_consulta,usuario_id,creado) VALUES ('$paciente','$nota','$tipo_consulta','$fecha_consulta','$usuario','NOW()');";

    if (!$resultado = $mysqli->query($sql)) {
        echo '<script>alert("Lo sentimos, este sitio web est&aacute; experimentando re problemas.")</script>';
        $mysqli->close();
        exit;
    }
    $mysqli->close();

    if (isset($_POST['location'])){
        header("Location: $location");
    }else{
        header("Location: ./index.php");

    }
}


?>
