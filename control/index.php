<?php 
session_start();
?>
<html lang="es">

<head>
    <title>TTP CONTROL - Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body><br>
    <div class="container">
        <h1 class="display-4">Hola, <?php echo $_SESSION["nombre"];?></h1>
        <p class="lead">Elige alguna de las opciones de este panel de control</p>
    </div><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="abono.php" class="btn btn-sq-lg btn-success btn-block"> Renovar abono</a> <br>
                <a href="#" class="btn btn-sq-lg btn-info btn-block"> Historial de viajes</a> <br>
                <a href="#" class="btn btn-sq-lg btn-warning btn-block"> Informacion</a> <br>
                <a href="#" class="btn btn-sq-lg btn-danger btn-block"> Gestion de usuario</a> <br>
            </div>
        </div>
    </div>
    <div class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-bottom" style="position:fixed;bottom:0;width: 100%">
        <div class="container">
            <a class="navbar-text pull-left" style="color: white"><?php echo $_SESSION["nombreCompleto"];?></a>
            <a target="_blank" href="logout.php" class="navbar-btn btn-danger btn pull-right">CERRAR SESION</a>
        </div>
    </div>
</body>

</html>
