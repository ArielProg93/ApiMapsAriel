<?php
require_once "../config/conexion.php";

if (isset($_POST)) {
    if (!empty($_POST)) {
         $info = $_POST['descripcion'];
        $img = $_FILES['imagen'];
        $name = $img['name'];
        $tmpname = $img['tmp_name'];
        $fecha = date("YmdHis");
        $img = $fecha. ".jpg";
        $destino = "../img/works/" . $img;
        $query = mysqli_query($conexion, "INSERT INTO especialidades (descripcion, imagen) VALUES ('$info', '$img')");
        if ($query) {
            if (move_uploaded_file($tmpname, $destino)) {
                
                header('Location: ferias.php');
            }
        }
    }
}

        include("includes/header.php"); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">ESPECIALIDADES</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="abrirProducto"><i class="fas fa-plus fa-sm text-white-50"></i> Agregar Especialidad</a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <!-- <th>Descripción</th> -->
                        <th>ID</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conexion, "SELECT * FROM especialidades ORDER BY id ASC");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                           
                            <td><?php echo $data['id']; ?></td>
                            <td width="350"><?php echo $data['descripcion']; ?></td>
                            <td><img class="img-thumbnail" src="..\img\works\<?php echo $data['imagen']; ?>" width="250"></td>
                            <td>
                                <form method="Post" action="editarFerias.php?accion=feria&id=<?php echo $data['id']; ?>" class="d-inline">
                                    <button class="btn btn-success" type="submit">Editar</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="eliminar.php?accion=feria&id=<?php echo $data['id']; ?>" class="d-inline eliminar">
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>                               
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="productos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title" id="title">Agregar Especialidad</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                       
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea id="descripcion" class="form-control" name="descripcion" placeholder="Descripción" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control" name="imagen" required>
                            </div>
                        </div>
                    
                    </div>
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>