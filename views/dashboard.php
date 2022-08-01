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
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-10">
                    <?php
                    if(User::getRole($connection, $_SESSION['id'])->getName()==="admin"){
                        ?>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <h3>Subir un nuevo documento:</h3>

                            <label for="name">Nombre</label>
                            <input class="form-control" name="name"
                                   id="name" type="text"
                                   placeholder="Nombre del archivo"
                                   required />
                            <br />

                            <label for="document">Archivo</label>
                            <input class="form-control" type="file"
                                   name="document" id="document"
                                   required />
                            <br />

                            <button class="btn btn-primary">Crear</button>
                        </form>
                        <?php
                    }
                    else{ ?>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($documents as $document){
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $document['id'] . "<br />"; ?></td>
                                    <td><?php echo $document['name'] . "<br />"; ?></td>
                                    <td><?php echo $document['status'] . "<br />"; ?></td>
                                    <td>
                                        <a href="public/downloads/<?php echo $document['file']; ?>"
                                           download class="btn btn-primary">Descargar Archivo</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include('views/shared/logout-modal.php') ?>
<?php include('views/shared/footer.php') ?>

</body>
</html>


