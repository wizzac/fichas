<?php
include("../header.php");


    if (isset($_POST['submit'])) {

        $id=$_POST['id'];

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];

        if(isset($_POST['referencia'])){
            $referencia = $_POST['referencia'];
        }else{
            $referencia = NULL;
        }

        if(isset($_POST['dni'])){
            $dni = $_POST['dni'];
        }else{
            $dni= NULL;
        }

        if(isset($_POST['fecha_nac'])){
            $fecha_nac = $_POST['fecha_nac'];
        }else{
            $fecha_nac =NULL;
        }

        if(isset($_POST['telefono'])){
            $telefono = $_POST['telefono'];
        }else{
            $telefono = NULL;
        }

        if(isset($_POST['telefono2'])){
            $telefono2 = $_POST['telefono2'];
        }else{
            $telefono2 = NULL;
        }

        if(isset($_POST['notas'])){
            $notas = $_POST['notas'];
        }else{
            $notas =NULL;
        }

        if(isset($_POST['direccion'])){
            $direccion = $_POST['direccion'];
        }else{
            $direccion =NULL;
        }

        if (isset($_POST['location'])){
            $location = $_POST['location'];
        }
        $mysqli = new mysqli($ip, $userBase, $passBase, $nombreBase);

        if ($mysqli->connect_errno) {
            echo '<script>alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.")</script>';
            exit;
        }



        $sql = "UPDATE pacientes SET VALUES
                    nombre = $nombre,
                    apellido = $apellido,
                    fecha_nac = $fecha_nac,
                    dni = $dni,
                    referencia = $referencia,
                    direccion = $direccion,
                    notas = $notas,
                    telefono = $telefono,
                    telefono2 = $telefono2)
                 WHERE id = $id";




        if(isset($_FILES['foto'])){
            $foto=basename($_FILES["foto"]["name"]);
            $target_dir = "../perfiles/";
            $target_file = $target_dir . basename($_FILES["foto"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["foto"]["tmp_name"]);
            echo $_FILES['foto']['name'];
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if ($_FILES["fileToUpload"]["size"] > 5000000) {
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
            } else {
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }


            $sql = "UPDATE pacientes SET VALUES
                    nombre = $nombre,
                    apellido = $apellido,
                    fecha_nac = $fecha_nac,
                    foto = $foto,
                    dni = $dni,
                    referencia = $referencia,
                    direccion = $direccion,
                    notas = $notas,
                    telefono = $telefono,
                    telefono2 = $telefono2)
                 WHERE id = $id";

        }


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
