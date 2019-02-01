<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body style="background: #5a6268">
    <div class="jumbotron" style="text-align: center">
        <h1>Complete sus datos de Registro</h1>
        <div id="error" class="alert-danger">
            <?php
            if(isset($_GET["e"])){
                $error=$_GET["e"];
                if($error==1){
                    echo "No se han introducido los datos necesarios";
                }
                if($error==2){
                    echo "Las contraseñas no coinciden";
                }
                if($error==3){
                    echo "No es posible conectar con la base de datos";
                }
                if($error==4){
                    echo "El nombre de usuario ya existe";
                }
            }
            ?>
        </div>
        <form action="registrar.php" method="post"><br>
            <input type="text" id="user" name="user" placeholder="Nombre de Usuario @">
            <input type="text" id="nombre" name="nombre" placeholder="Nombre">
            <br>
            <br>
            <input type="text" id="apellido1" name="apellido1" placeholder="Primer Apellido">
            <input type="text" id="apellido2" name="apellido2" placeholder="Segundo Apellido*">
            <br>
            <br>
            <input type="email" id="email" name="email" placeholder="Email">
            <br>
            <br>
            <input type="password" id="pass" name="pass" placeholder="Contraseña">
            <input type="password" id="pass2" name="pass2" placeholder="Confirmar Contraseña">
            <br>
            <br>
            <label for="apellido2" class="alert-dark">*Opcional</label>
            <br>
            <button class="btn btn-primary">Enviar</button>
            <br><br>
            <a href="index.php" class="btn-lg">Volver a Inicio</a>
        </form>
    </div>

</body>
</html>