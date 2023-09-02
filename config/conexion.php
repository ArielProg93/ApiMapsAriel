<<<<<<< HEAD
<?php
    $host = "localhost";
    $usuario = "root";
    $clave = "";
    $bd = "subalternativa";
    $conexion = mysqli_connect($host,$usuario,$clave,$bd);
    if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }
    mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");
    mysqli_set_charset($conexion,"utf8");
=======
<?php
    $host = "localhost";
    $usuario = "root";
    $clave = "";
    $bd = "subalternativa";
    $conexion = mysqli_connect($host,$usuario,$clave,$bd);
    if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }
    mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");
    mysqli_set_charset($conexion,"utf8");
>>>>>>> ed081a390318c2257444365a525a55feb75b02c0
?>