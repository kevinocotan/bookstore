<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/bootstrap.min.css">
    <title>..::BookStore::..</title>
</head>
<body class="pt-5 bg-dark">
    <div class="container">
        <div class="card col-md-6 col-sm-12 mx-auto">
            <div class="card-header">
                <h1 class="text-center">Inicio de sesión</h1>
            </div>
            <div class="card-body">
                <form action="login.php" id="formlogin">
                    <div class="form-floating mt-5">
                        <input type="text" class="form-control" id="floatingInput" placeholder="usuario" name="usuario">
                        <label for="floatingInput">usuario</label>
                    </div>
                    <div class="form-floating mt-5">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="alert alert-danger mt-5 d-none" role="alert" id="mensaje">
                        Mensaje
                    </div>
                    <div class="d-grid gap-2 mt-5">
                        <button class="btn btn-success" type="submit">Iniciar Sesión</button>
                    </div>
                </form>
                <p class="text-muted text-center mt-5">
                    Copyright&copy; 2022
                </p>
            </div>
        </div>
    </div>
    <script src="<?php echo URL; ?>public_html/customjs/api.js"></script>
    <script src="<?php echo URL; ?>public_html/customjs/login.js"></script>
</body>
</html>