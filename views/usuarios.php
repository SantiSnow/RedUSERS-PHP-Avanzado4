<!doctype html>
<html lang="en">
<head>
    <?php include('views/shared/head.php') ?>
</head>
<body>
<div id="wrapper">
    <?php include('views/shared/sidebar.php') ?>
    <div id="content-wrapper" class="d-flex flex-column pt-3">
        <div class="container">
            <div class="row">
                <h1>Usuarios</h1>
            </div>
            <div class="row">
                <div class="col-10">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Rol del sistema</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($users as $user){
                        ?>
                            <tr>
                                <td><?php echo $user->id; ?></td>
                                <td><?php echo $user->name; ?></td>
                                <td><?php echo $user->email; ?></td>
                                <td><?= ($user->role_id==1) ? "Admin" : "Invitado"; ?></td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include('views/shared/logout-modal.php') ?>
<?php include('views/shared/footer.php') ?>

</body>
</html>


