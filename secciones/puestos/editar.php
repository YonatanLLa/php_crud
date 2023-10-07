<?php
include("../../db.php");


if (isset($_GET['txtID'])) {
    // Recepcionar id
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM tbl_puestos WHERE id=:id");

    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    $nombredelpuesto = $registro["nombredelpuesto"];

    // header("Location:index.php");
}

if ($_POST) {
    print_r($_POST);
    // recepcionar los datos
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $nombredelpuesto = (isset($_POST["nombredelpuesto"]) ? $_POST["nombredelpuesto"] : "");
    // verificar si no esta vacio

    if (!empty($nombredelpuesto)) {
        try {
            //  Preparar la consulta SQL con una conexcion PDO valida

            $sentencia = $conexion->prepare("UPDATE  tbl_puestos SET nombredelpuesto=:nombredelpuesto WHERE id=:id");
            $sentencia->bindParam(":nombredelpuesto", $nombredelpuesto);
            $sentencia->bindParam(":id", $txtID);

            $sentencia->execute();

            // Renderizar o mostrar un sms de exito
            header("Location:index.php");
        } catch (PDOException $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        }
    }
}
?>

<?php include("../../templat/header.php"); ?>
<hr>

<div class="card">
    <div class="card-header">
        Puestos
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input type="text" value="<?php echo $txtID; ?>" class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">

            </div>
            <div class="mb-3">
                <label for="nombredelpuesto" class="form-label">Nombre del puesto: </label>
                <input type="text" value="<?php echo $nombredelpuesto; ?>" class="form-control" name="nombredelpuesto" id="nombredelpuesto" aria-describedby="helpId" placeholder="nombre del puesto">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include("../../templat/footer.php"); ?>