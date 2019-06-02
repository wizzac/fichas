<!DOCTYPE HTML>

<html>

<?php
session_start();

include("header.php");





	if (isset($_COOKIE['logged'])) {
        if($_COOKIE['logged']==true){
            $usuario=$_COOKIE['usuarioId'];
            $mysqli = new mysqli($ip, $userBase, $passBase, $nombreBase);
            $sql = "select * from sec_usuario where estado=1 and id='$usuario';";
            $resultado=$mysqli->query($sql);
            foreach($resultado as $registro){
                header("Location:./login.php");

            }
        }

    }else{
    }

?>


<head>
	<title>Hielo by TEMPLATED</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />



</head>
<body style='background-image: url("images/slide05.jpg");'>
<section class="full login">
	<div class="inner">
		<header class="align-center">
			<h2>Login</h2>
		</header>

		<div class="login-page">
			<div class="form">
				<form class="login-form" method="post" action="./sql/validarUsuario.php">
					<input type="text" name="user" placeholder="Usuario" required/>
					<input type="password" name="pass" placeholder="Password" required/>
					<button type="submit" style="text-align: center">Login</button>
				</form>
			</div>
		</div>

	</div>
</section>





</body>
</html>