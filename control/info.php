<?php 
session_start();
?>


<?php

$sql = "SELECT * FROM clientes where codCliente=".$_SESSION["codCliente"];
function connectDB(){
        $server = "localhost";
        $user = "root";
        $pass = "";
        $bd = "ttp";
    $conexion = mysqli_connect($server, $user, $pass,$bd);
        if($conexion){
        }else{
            echo 'Ha sucedido un error inexperado en la conexion de la base de datos';
        }
    return $conexion;
}
function disconnectDB($conexion){
    $close = mysqli_close($conexion);
        if($close){
        }else{
            echo 'Ha sucedido un error inexperado en la desconexion de la base de datos';
        }   
    return $close;
}
function getArraySQL($sql){
    $conexion = connectDB();
    mysqli_set_charset($conexion, "utf8");
    if(!$result = mysqli_query($conexion, $sql)) die(); 
    $rawdata = array(); 
    $i=0;
    while($row = mysqli_fetch_array($result))
    {
        $rawdata[$i] = $row;
        $i++;
    }
    disconnectDB($conexion);
    return $rawdata; 
}
        $myArray = getArraySQL($sql);
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
        </h1>
        <p class="lead">Esta es tu informacion personal</p>
    </div><br>
    <div class="container">
        <p class="lead"> Te llamas 
            <?php echo $myArray[0][2]." ".$myArray[0][3];?>
            </p>
        <p class="lead"> Naciste el 
                    <?php echo $myArray[0][7];?>
        </p>
        <?php
        if ($myArray[0][4]=="0"){
            echo '<p class="lead"> No tienes ningun abono activo</p><br><br>';
        } else if($myArray[0][4]=="1"){
            echo '<p class="lead"> Tienes un abono activo en la zona '.$myArray[0][5].'</p>';
            echo '<p class="lead"> Valido hasta el  '.$myArray[0][6].'</p><br><br>';
        }
        ?>
        <a href="gestion.php" class="navbar-btn btn-danger btn">Gestionar</a>

        
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
