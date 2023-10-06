<?php
include("../../db.php");
if ($_POST) {
    print_r($_POST);
    $nombredelpuesto = (isset($_POST["nombredelpuesto"]) ? $_POST["nombredelpuesto"] : "");
    // verificar si no esta vacio

    if (!empty($nombredelpuesto)) {
        try {
            //  Preparar la consulta SQL con una conexcion PDO valida
            $sentencia = $conexion->prepare("INSERT INTO tbl_puestos (id, nombredelpuesto) VALUES (null, :nombredelpuesto)");
            $sentencia->bindParam(":nombredelpuesto", $nombredelpuesto);
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
                <label for="nombredelpuesto" class="form-label">Nombre del puesto: </label>
                <input type="text" class="form-control" name="nombredelpuesto" id="nombredelpuesto" aria-describedby="helpId" placeholder="nombre del puesto">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>


<?php include("../../templat/footer.php"); ?>