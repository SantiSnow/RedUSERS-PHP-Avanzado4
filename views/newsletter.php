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
                <h1>Newsletter</h1>
            </div>
            <div class="row">
                <div class="col-8">

                    <h5>Correo</h5>
                    <form action="envio-correos.php" method="post" class="mt-3">
                        <label for="subject">Subject:</label>
                        <input type="text" name="subject" class="form-control" required />
                        <br />

                        <label for="body">Cuerpo:</label>
                        <textarea name="body" cols="5" class="form-control" required></textarea>
                        <br />

                        <button class="btn btn-primary">Enviar</button>
                    </form>

                </div>
                <div class="col-4">
                    <h5>Remitentes</h5>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($users as $user){
                        ?>
                        <tr>
                            <td scope="row"><?php echo $user->id; ?></td>
                            <td scope="row"><?php echo $user->name; ?></td>
                            <td scope="row"><?php echo $user->email; ?></td>
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

<script>

</script>

</body>
</html>


