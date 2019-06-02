<?php
include("../header.php");

$id=$_POST['id'];

if (isset($_POST['location'])){
    $location = $_POST['location'];
}
$mysqli = new mysqli($ip, $userBase, $passBase, $nombreBase);
if ($mysqli->connect_errno) {
    echo "<script>alert('Lo sentimos, este sitio web está experimentando problemas.')</script>";
    exit;
}

$sql = "update pacientes set estado='0' where id='$id';";

if (!$resultado = $mysqli->query($sql)) {
    echo "<script>alert('Lo sentimos, este sitio web está experimentando problemas.') </script>";
    $mysqli->close();
    exit;
}

$mysqli->close();
if (isset($_POST['location'])){
    header("Location: $location");
}


?>
