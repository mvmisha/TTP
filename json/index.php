<?php
$paramEntrada=$_GET['codigo'];

$sql = "SELECT usu FROM clientes where codCliente=".$paramEntrada;
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
        echo json_encode($myArray);
?>
