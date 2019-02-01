<?php
if (isset($_COOKIE["user"],$_COOKIE["pass"])) {
    setcookie("user","",time()-60*60);
    setcookie("pass","",time()-60*60);
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body style="background: #5a6268">
    <div id="inicio" class="jumbotron" style="text-align: center">
        <h1>Bienvenido</h1>
        <br>
        <a href="inicio.php" class="btn btn-primary" type="button">Iniciar sesión</a>
        <br><br>
        <a href="registro.php" class="btn btn-primary" type="button" >Registrar Usuario</a>
    </div>
</body>
</html>