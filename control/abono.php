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
        <p class="lead">Aqui puedes recargar tu abono</p>
    </div><br>
    <div class="container">

        <form action="recargar.php" method="post">
            <div class="form-group">
                <label>Correo de confirmacion</label>
                <input type="email" class="form-control" id="confirmCorreo" placeholder="nombre@hehehe.com">
            </div>
            <div class="form-group">
                <label>Seleccione la zona de su abono, <a target="_blank" href="../index.html">informacion.</a></label>
                <select class="form-control" id="selectZona">
                  <option>A1</option>
                  <option>B1</option>    
                  <option>B2</option>
                  <option>B3</option>
                  <option>C1</option>
                  <option>C2</option>
                  <option>E1</option>
                  <option>E2</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Recargar</button>
            </div>

        </form>
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
