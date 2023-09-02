<?php
if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['id'])) {
        require_once "../config/conexion.php";
        $id = $_GET['id'];
        if ($_GET['accion'] == 'feria') {
            $query = mysqli_query($conexion, "DELETE FROM especialidades WHERE id = $id");
            if ($query) {
                header('Location: ferias.php');
            }
        }
        if ($_GET['accion'] == 'comen') {
            $query = mysqli_query($conexion, "DELETE FROM comentario WHERE id = $id");
            if ($query) {
                header('Location: comentarios.php');
            }
        }
        if ($_GET['accion'] == 'user') {
            $query = mysqli_query($conexion, "DELETE FROM usuario WHERE id = $id");
            if ($query) {
                header('Location: usuario.php');
            }
        }
       
    }
}
?>
