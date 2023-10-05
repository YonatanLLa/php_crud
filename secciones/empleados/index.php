<?php include("../../templat/header.php"); ?>
<hr />
<h3 class=" text-center p-3"> Empleados</h3>
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
                    <tr class="">
                        <td scope="row">Yonatan llanto</td>
                        <td>image.png</td>
                        <td>CV.pdf</td>
                        <td>Programador Sr.</td>
                        <td>12/12/2019</td>
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
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php include("../../templat/footer.php"); ?>