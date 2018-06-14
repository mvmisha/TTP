<?php 
session_start();
?>
<html lang="es">

<head>
    <title>TTP CONTROL - Abono</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body><br>
    <div class="container">
        <h1 class="display-4">Hola,
            <?php echo $_SESSION["nombre"];?>
        </h1>
        <p class="lead">Edita la informacion que eligas o date de baja si asi lo deseas</p>
    </div><br>
    <div class="container">

     
    <div class="container">
            <br><br>
            <form class="form-horizontal" name="formregistro" id="formregistro" action="enviarRegistro.php" method="post">
                <div class="row form-group">
                    <div class="col-sm-3">
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-3">
                        <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Contraseña" required>
                    </div>
                    <div class="col-sm-3">
                        <input type="password" name="pwddos" class="form-control" id="pwddos" placeholder="Repita la contraseña" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-3">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Correo Electronico" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-3">
                        <input placeholder="Fecha de nacimiento" class="form-control" type="text" onfocus="(this.type='date')" id="fechanacimiento" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" onclick="comprobarRegistro()" class="btn btn-default">Cambiar</button>
                        <button type="submit" onclick="comprobarRegistro()" class="btn btn-danger">Eliminar cuenta</button>

                    </div>
                </div>
            </form>
        </div>    
              
    </div>
    <div class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-bottom" style="position:fixed;bottom:0;width: 100%">
        <div class="container">
            <a class="navbar-text pull-left" style="color: white">
                <?php echo $_SESSION["nombreCompleto"];?>
            </a>
            <a href="index.php" class="navbar-btn btn-info btn" style="margin-left:68%;">Inicio</a>
            <a href="logout.php" class="navbar-btn btn-danger btn">CERRAR SESION</a>
        </div>
    </div>
</body>

</html>
