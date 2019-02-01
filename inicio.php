<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body style="background: #5a6268">
    <div class="jumbotron" style="text-align: center">
        <h1>Inicie Sesión</h1>
        <div id="error" class="alert-danger">
            <?php
            if(isset($_GET["e"])){
                $error=$_GET["e"];
                if($error==1){
                    echo "No se han introducido datos";
                }
                if($error==2){
                    echo "No se puede conectar con la Base de Datos";
                }
                if($error==3) {
                    echo "Usuario o contraseña erróneos";
                }
            }
            ?>
        </div>
        <form action="iniciar.php" method="post">
            <br>
            <input type="text" id="user" name="user" placeholder="Usuario">
            <br>
            <br>
            <input type="password" id="pass" name="pass" placeholder="Contraseña">
            <br><br>
            <button class="btn btn-primary">Acceder</button>
            <br>
        </form>
        <br>
        <a href="index.php" class="btn-lg">Volver a Inicio</a>
    </div>
</body>
</html>