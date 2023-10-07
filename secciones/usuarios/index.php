<?php
include("../../db.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("DELETE FROM tbl_usuarios WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    header("Location: index.php");
}

$sentencia = $conexion->prepare("SELECT * FROM `tbl_usuarios`");
$sentencia->execute();
$lista_de_users = $sentencia->fetchAll(PDO::FETCH_ASSOC);


?>

<?php include("../../templat/header.php"); ?>
<hr />

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar usuario</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre del usuario</th>
                        <th scope="col">correo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($lista_de_users as $user) {
                    ?>
                        <tr class="">
                            <td scope="row"><?php echo $user['id'] ?></td>
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td>
                                <a name="btneditar" id="btneditar" class="btn btn-success" href="editar.php?txtID=<?php echo $user["id"] ?>" role="button">Update</a>
                                <a name="btnborrar" id="btnborrar" class="btn btn-danger" href="index.php?txtID=<?php echo $user["id"] ?>" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include("../../templat/footer.php"); ?>