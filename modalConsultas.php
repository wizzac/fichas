<?php
session_start();
include("header.php");
$mysqli = new mysqli($ip, $userBase, $passBase, $nombreBase);
if ($mysqli->connect_errno) {
    echo '<script>alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.")</script>';
    exit;
}


if(isset($_POST['id'])) {
    $output='';
    $sql="SELECT * from consultas where id='".$_POST['id']."'";
    $resultado=$mysqli->query($sql);
    foreach($resultado as $registro) {
        $output.='
		<div class="modal-header">
			<h1>Consulta</h1>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-sm-12">
				<p style="font-size:20px;">Fecha: '.$registro['fecha_consulta'].'</p>
				<p style="font-size:20px;">Notas: '.$registro['nota'].'</p>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" data-dismiss="modal">close</button>
		</div>';
    }
    echo $output;
}else{
    header("Location:./consultas.php");
}
?>