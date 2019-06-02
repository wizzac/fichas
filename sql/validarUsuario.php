<?php
session_start();

include("../header.php");


$usuario=$_POST['user'];
$pass=$_POST['pass'];

$mysqli = new mysqli($ip, $userBase, $passBase, $nombreBase);
$sql = "select * from sec_usuario where estado=1 and user='$usuario' and pass='$pass';";
$resultado=$mysqli->query($sql);
    foreach($resultado as $registro){
        setcookie('usuarioId', $registro['id'], time() + (86400 * 90), "/"); // 86400 = 1 day
        setcookie('logged',true, time() + (86400 * 90), "/"); // 86400 = 1 day
        header("Location:../login.php");
    }


?>