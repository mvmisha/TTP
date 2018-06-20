<?php 
session_start();
?>



<?php

$sql = "SELECT * FROM viajes where codCliente=".$_SESSION["codCliente"];
$sql2 = "Select * from paradas";
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
        $paradas = getArraySQL($sql2);
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

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />

        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

    </head>

    <body><br>
        <div class="container">
            <h1 class="display-4">Hola,
                <?php echo $_SESSION["nombre"];?>
            </h1>
            <p class="lead">Este es tu historial de viajes</p>
        </div><br>
        <div class="container">

            <?php 
                if (empty($myArray)){
                    echo '<h1 class="display-4> Todavia no has realizado ningun viaje<h1>';
                } else{ 
            ?>

            <table id="tablahistorico" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead class="thead-light">

                    <tr>
                        <th>Codigo de parada</th>
                        <th>Nombre de parada</th>
                        <th>Zona</th>
                        <th>Linea</th>
                        <th>Fecha</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    $filas =count($myArray);
                    
                    $nparadas =count($paradas);
                    for($i=0;$i<$filas;$i++){
                        echo '<tr>';
                        echo '<td>'.$myArray[$i][1].'</td>';
                        for($e=0;$e<$nparadas;$e++){
                            if($myArray[$i][1]==$paradas[$e][0]){
                                echo '<td>'.$paradas[$e][1].' </td>';
                                echo '<td>'.$paradas[$e][2].' </td>';
                                break;
                            }
                        }
                        echo '<td>'.$myArray[$i][3].'</td>';
                        echo '<td>'.$myArray[$i][2].'</td>';
                        echo '</tr>';
                    }
                    
                }
                ?>
                </tbody>
            </table>
            <script>
                $(document).ready(function() {
                    $('#tablahistorico').DataTable();
                });

            </script>
        </div><br><br><br><br><br><br>
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
