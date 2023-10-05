<?php include("../../templat/header.php"); ?>
<hr/>

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
            <tr class="">
                <td scope="row">1</td>
                <td>Yonatan Lla.</td>
                <td>yonatanllanto175@gmail.com</td>
                <td>
                    <a name="btneditar" id="btneditar" class="btn btn-success" href="#" role="button">Update</a>
                    <a name="btnborrar" id="btnborrar" class="btn btn-danger" href="#" role="button">Delete</a>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>
    </div>
    
</div>
<?php include("../../templat/footer.php"); ?>