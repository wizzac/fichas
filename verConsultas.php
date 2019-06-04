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
$mysqli = new mysqli($ip, $userBase, $passBase, $nombreBase);
if ($mysqli->connect_errno) {
    echo '<script>alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.")</script>';
    exit;
}
$sql = "select * from consultas where estado=1 and paciente_id=$id";
$resultado=$mysqli->query($sql);
?>

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
                <div class="row">
                    <a href="./crearConsultas.php?id=<?php echo($id); ?>" class="button btn ">Crear nueva consulta</a>
                    <br>
                </div>
                <br>
                <div class="container">
                    <table>
                        <thead>
                        <td>Ver</td>
                        <td>Fecha</td>
                        <td>Tipo Consulta</td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                        </thead>
                        <tbody>
                        <?php
                        foreach($resultado as $item){
                            echo("
                            <tr>
                            <td><button class='btn button show_data' id='$item[id]';>Ver</button></td>
                            <td>$item[fecha_consulta]</td>
                            <td>$item[tipo_consulta]</td>
						    <script>    
                                $('#link_ver$item[id]').click(function(){
                                   $('#form_ver$item[id]').submit();
                                });
                            </script> 
                               
						        <td id='btnedit$item[id]' class='hov'>
						            <form id='form_edit$item[id]' method='post' action='./editConsulta.php'>
						                <i class='fa fa-pencil'></i>
						                <input type='hidden' name='id' value='$item[id]'/>
						                <input type='hidden' name='paciente_id' value='$item[paciente_id]'/>
						            </form>
						        </td>
						        
						        <script>
                                   $('#btnedit$item[id]').click(function(){
                                       $('#form_edit$item[id]').submit();
                                   });
                                </script>
                                
                                <td id='btndel$item[id]' class='hov'>
						            <form id='form_del$item[id]' method='post' action='./sql/deleteConsulta.php'>
						                <i class='fa fa-times'></i>
						                <input type='hidden' name='id' value='$item[id]'/>
						                <input type='hidden' name='location' value='../consultas.php'/>
						            </form>
						        </td>
						        
						        <script>
                                   $('#btndel$item[id]').click(function(){
                                       if (confirm('Esta Seguro que desesa eliminar ? ') == true) {
                                       $('#form_del$item[id]').submit();
                                    }
                                   });
                                </script>
                            </tr>
                            ");
                        }
                        }else{
                            header("Location:./consultas.php");
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>

<div class="modal fade" id="dataModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="data">

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on('click','.show_data',function() {
        var id=$(this).attr("id");
        $.ajax({
            url:"modalConsultas.php",
            method:"post",
            data:{id:id},
            success:function(data)
            {
                $('#data').html(data);
                $('#dataModal').modal("show");
            }
        });
    });
</script>


</body>
</html>