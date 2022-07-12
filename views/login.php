<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .container{
            margin: 0;
            padding: 0;
            max-width: 100vw;
            width: 100vw;
            overflow: hidden;
        }
        #formLogin{
            background-color: #ffffff;
            height: 100vh;

        }
        #backImg{
            background-image: url("./public/imgs/bg-buildings.jpg");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-6 col-lg-6 d-flex justify-content-center align-items-center" id="formLogin">
                <form action="" method="post">
                    <label for="email">Email: </label>
                    <input type="email" name="email" class="form-control" required />
                    <br />

                    <label for="password">Password: </label>
                    <input type="password" name="password" class="form-control" required />
                    <br />

                    <button class="btn btn-primary">Ingresar</button>
                </form>
            </div>
            <div class="col-6 col-md-6 col-lg-6" id="backImg">

            </div>
        </div>
    </div>
</body>
</html>