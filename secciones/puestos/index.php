<?php
include("../../db.php");


if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia = $conexion->prepare("DELETE FROM tbl_puestos WHERE id=:id");

    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    header("Location:index.php");
}


$sentencia = $conexion->prepare("SELECT * FROM `tbl_puestos` ");
$sentencia->execute();
$lista_tbl_puestos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include("../../templat/header.php"); ?>
<hr />

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre del puesto</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($lista_tbl_puestos as $resgistro) {
                    ?>
                        <tr class="">
                            <td scope="row"><?php echo $resgistro['id'] ?></td>
                            <td><?php echo $resgistro['nombredelpuesto'] ?></td>
                            <td>
                                <a name="btneditar" id="btneditar" class="btn btn-success" href="#" role="button">Update</a>
                                <a name="btneditar" id="btneditar" class="btn btn-danger" href="index.php?txtID=<?php echo $resgistro['id']; ?>" role="button">Delete</a>

                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

</div>


<?php include("../../templat/footer.php"); ?>