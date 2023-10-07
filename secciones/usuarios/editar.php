<?php 
  include("../../db.php");

  if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    print_r($txtID);

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