<?php
include("../../db.php");

$name = "";
$email = "";
$password = "";

if ($_POST) {
  // Captura los valores del formulario
  $name = isset($_POST["name"]) ? $_POST["name"] : "";
  $email = isset($_POST["email"]) ? $_POST["email"] : "";
  $password = isset($_POST["name"]) ? $_POST["name"] : "";

  // Verificar que los campos requeridos no estan vacios
  if (!empty($name) && !empty($email) && !empty($password)) {
    // Prueba la consulta SQL para insertar los datos
    $sentencia = $conexion->prepare("INSERT INTO tbl_usuarios (name, email, password) VALUES (:name, :email, :password)");

    // Bind de los parametros
    $sentencia->bindParam(":name", $name);
    $sentencia->bindParam(":email", $email);
    $sentencia->bindParam(":password", $password);

    if ($sentencia->execute()) {
      header("Location: index.php");
      exit();
    } else {
      echo "Error al registrar el usuario";
    }
  }else {
    echo "Todo los campos son requeridos";
  }
}else {
  echo "Todo los campos son requeridos";
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
        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="nombre del puesto">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">email: </label>
        <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="nombre del puesto">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">password: </label>
        <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="nombre del puesto">
      </div>

      <button type="submit" class="btn btn-success">Agregar</button>
      <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </form>
  </div>
  <div class="card-footer text-muted">

  </div>
</div>

<?php include("../../templat/footer.php"); ?>