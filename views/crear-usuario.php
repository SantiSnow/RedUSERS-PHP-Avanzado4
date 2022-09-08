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
                <h1>Cargar usuarios</h1>
            </div>
            <div class="row">
                <div class="col-10">
                    <form action="registrar.php" method="post">

                        <label for="name">Name</label>
                        <input name="name" id="name" type="text" placeholder="Ingrese nombre" class="form-control" required />
                        <br />

                        <label for="email">Email</label>
                        <input name="email" id="email" type="email" placeholder="Ingrese email" class="form-control" required />
                        <br />

                        <label for="password">Password</label>
                        <input name="password" id="password" type="password" placeholder="Ingrese contraseña" class="form-control" required />
                        <br />

                        <button type="submit" class="btn btn-primary">Crear</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('views/shared/logout-modal.php') ?>
<?php include('views/shared/footer.php') ?>

</body>
</html>


