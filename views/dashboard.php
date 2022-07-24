<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="row">
        <h1>Dashboard</h1>
        <div class="col-6">
            <?php
            if(User::getRole($connection, $_SESSION['id'])['title']==="admin"){
                ?>
                <form>
                    <h3>Subir un nuevo documento:</h3>

                    <label for="name">Nombre</label>
                    <input class="form-control" type="text" placeholder="Nombre del archivo" required />
                    <br />

                    <label for="name">Archivo</label>
                    <input class="form-control" type="file" required />
                    <br />

                    <button class="btn btn-primary">Crear</button>
                </form>
                <?php
            }
            else{

            }
            ?>
        </div>
    </div>
</div>

</body>
</html>
