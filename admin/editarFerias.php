<?php
require_once "../config/conexion.php";
if (isset($_POST)) {
    if (!empty($_POST)) {
        $id = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $img = $_FILES['imagen'];
        $name = $img['name'];
        $tmpname = $img['tmp_name'];
        $fecha = date("YmdHis");
        $img = $fecha. ".jpg";
        $destino = "../img/works/" . $img;
        $query = mysqli_query($conexion, "UPDATE especialidades SET descripcion= '$descripcion' , imagen='$img' where id = '$id'");
        if ($query) {
            if (move_uploaded_file($tmpname, $destino)) {
                
                header('Location: ferias.php');
            }
        }
    }
}
?>
<?php
if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['id'])) {
        require_once "../config/conexion.php";
        $id = $_GET['id'];
        if ($_GET['accion'] == 'feria') {
            $query = mysqli_query($conexion, "SELECT * FROM especialidades WHERE id= $id");
        }
    }
}
?>
<?php include("includes/header.php");?>
<?php
            $result = mysqli_num_rows($query);
            if ($result > 0) {
                while ($data = mysqli_fetch_assoc($query)) { ?>
                <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                <label for="nombre">id</label>
                        <input type="text" readonly class="form-control-plaintext" name="id" value="<?php echo $data['id']; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea id="descripcion" class="form-control" name="descripcion" value="<?php echo $data['descripcion']; ?>" required><?php echo $data['descripcion']; ?></textarea>
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="imagen3">Imagen</label>
                                <input type="file" class="form-control" name="imagen" required>
                            </div>
                        </div>
                        
                    </div>
                    <button class="btn btn-primary" type="submit">Actualizar</button>
                </form>
                <?php  }
                } ?>
<?php include("includes/footer.php"); ?>