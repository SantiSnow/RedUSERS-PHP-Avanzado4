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
                                <th scope="col">Nombre</th>
                                <th scope="col">Status</th>
                                <th scope="col">Archivo</th>
                                <th scope="col">Finalizar</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($documents as $document){
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $document['id']; ?></td>
                                    <td><?php echo $document['name']; ?></td>
                                    <td><?= ($document['status']==0) ? "Pendiente" : "Listo"; ?></td>
                                    <td>
                                        <a href="public/downloads/<?php echo $document['file']; ?>"
                                           download class="btn btn-primary">Descargar Archivo</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning" onclick="marcarComoTerminado(<?= $document['id'] ?>, <?= $document['status'] ?>)">
                                            Finalizar
                                        </button>
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

<script>
    function marcarComoTerminado(id, status)
    {
        console.log("Documento terminado: ", id);

        const peticion = JSON.stringify({
            "id": id,
            "status": status
        });

        console.log(peticion);

        fetch("http://localhost/pruebas-php-2/mark-as-done.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
            },
            body: peticion
        })
            .then((response) => response.json())
            .then(
                (result) => {
                    console.log(result);
                },
                (error) => {
                    console.log(error);
                }
            );

    }
</script>

</body>
</html>


