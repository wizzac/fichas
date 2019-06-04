<?php
include("../header.php");


if (isset($_POST['submit'])) {

    $id=$_POST['id'];
    $paciente_id=$_POST['paciente_id'];
    $fecha_consulta=$_POST['fecha_consulta'];
    $tipo_consulta=$_POST['tipo_consulta'];
    $nota=$_POST['nota'];

    if (isset($_POST['location'])){
        $location = $_POST['location'];
    }
    $mysqli = new mysqli($ip, $userBase, $passBase, $nombreBase);
    if ($mysqli->connect_errno) {
        echo '<script>alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.")</script>';
        exit;
    }


    $sql = "UPDATE consultas SET
                    paciente_id= $paciente_id,
                    fecha_consulta=$fecha_consulta,
                    tipo_consulta=$tipo_consulta,
                    nota = $nota
                 WHERE id = $id";
    if (!$resultado = $mysqli->query($sql)) {
        echo '<script>alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.")</script>';
        $mysqli->close();
        exit;
    }


    $mysqli->close();
    if (isset($_POST['location'])){
        header("Location: $location");
    }
}


?>
