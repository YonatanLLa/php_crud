<?php include("../../templat/header.php"); 
    include("../../db.php");
    $sentecia = $conexion->prepare("SELECT * FROM `tbl_empleados`");
    $sentecia->execute();
    $lista_tbl_empleados = $sentecia->fetchAll(PDO::FETCH_ASSOC);
    print_r($lista_tbl_empleados)
?>
<hr />
<h3 class="text-center p-3"> Empleados</h3>
<div class="card">
    <div class="card-header">

        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">
            Agregar register
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Nombe</th>
                        <th scope="col">Foto</th>
                        <th scope="col">CV</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Fecha de ingreso</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($lista_tbl_empleados as $registro){
                    ?>
                    <tr class="">
                        <td scope="row"><?php   
                       echo $registro['primernombre'] ." ". 
                        $registro['segundonombre'] ." ". 
                        $registro['primerapellido'] ." ". 
                        $registro['segundoapellido'] 
                        ?></td>
                        <td><?php echo $registro['foto']  ?></td>
                        <td><?php echo $registro['cv']  ?></td>
                        <td><?php echo $registro['idpuesto']  ?></td>
                        <td><?php echo $registro['fechadeingreso']  ?></td>
                        <td>
                            <a name="" id="" class="btn btn-success" href="#" role="button">
                                Save
                            </a>
                            |<a name="" id="" class="btn btn-primary" href="#" role="button">
                                Update
                            </a>|
                            <a name="" id="" class="btn btn-danger" href="#" role="button">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php include("../../templat/footer.php"); ?>