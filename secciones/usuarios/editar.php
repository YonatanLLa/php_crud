<?php
include("../../db.php");

if (isset($_GET['txtID'])) {
  $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

  $sentencia = $conexion->prepare("SELECT * FROM tbl_usuarios WHERE id=:id");

  $sentencia->bindParam(":id", $txtID);
  $sentencia->execute();
  $users = $sentencia->fetch(PDO::FETCH_LAZY);
  // verifica si se ha envieado un formaulario para actualizar la contraseña
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $newPassword = $_POST['password'];

    // Genera un salt aleatorio único para este usuario
    $salt = bin2hex(random_bytes(16));
    $conbinedPassword = $newPassword . $salt;
    // Calcular el hash de la contraseña cobinada
    $hashedPassword = password_hash($conbinedPassword, PASSWORD_DEFAULT);

    $updateQuery = $conexion->prepare("UPDATE tbl_usuarios SET password = :password, salt = :salt WHERE id = :id");
    $updateQuery->bindParam(":password", $hashedPassword);
    $updateQuery->bindParam(":salt", $salt);
    $updateQuery->bindParam(":id", $txtID);
    $updateQuery->execute();
  }
}
?>

<?php include("../../templat/header.php"); ?>

<hr>

<div class="card">
  <div class="card-header">
    Datos del usuario
  </div>
  <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="name" class="form-label">name: </label>
        <input type="text" value="<?php echo $users["name"]; ?>" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="nombre del puesto">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">email: </label>
        <input type="text" value="<?php echo $users["email"]; ?>" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="nombre del puesto">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">password: </label>
        <input type="text" value="<?php echo $users["password"]; ?>" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="nombre del puesto">
      </div>

      <button type="submit" class="btn btn-success">Agregar</button>
      <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </form>
  </div>
  <div class="card-footer text-muted">

  </div>
</div>
<?php include("../../templat/footer.php"); ?>