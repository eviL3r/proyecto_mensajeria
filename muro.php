<?php
if (isset($_COOKIE["user"],$_COOKIE["pass"])){
    #comprobamos que nos vienen cookies
    $user=$_COOKIE["user"];$pass=$_COOKIE["pass"];
    #asignamos nombres a las variables
    $mysql=new mysqli("localhost","josegon","123456789H");
    #accedemos a la base de datos de xampp
    if ($mysql->select_db("mensajeria")){
        #seleccionamos la base de datos mensajeria
        $resultado=$mysql->query("SELECT * FROM mensajeria.usuarios WHERE login='{$user}';");
        $fila=$resultado->fetch_assoc();

        $nombre=$fila["nombre"];
        $apellido1=$fila["apellido1"];
        $apellido2=$fila["apellido2"];
        $email=$fila["email"];
        ?>
        <!doctype html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Muro de @<?=$user?></title>
            <link rel="stylesheet" href="css/bootstrap.css">
        </head>
        <body style="background: #5a6268">
        <div class="jumbotron">
            <h1>Muro de <?=$nombre." ".$apellido1." ".$apellido2?></h1>
            <div>
                <a href="index.php" class="btn-lg">Cerrar Sesión</a>
            </div>

        </div>
        </body>
        </html>
<?php
    }else{
        #error 2
        if ($mysql->connect_errno=2002){
            header("location:inicio.php?e=2");
            #no se puede conectar con la base de datos
        }
    }
}else{
    #error 1
    header("location:inicio.php?e=1");
    #Error al pasar las cookies
}
?>