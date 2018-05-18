<?php
$paramEntrada=$_GET['codigo'];

$sql = "SELECT * FROM clientes where codCliente=".$paramEntrada;
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
    $json = array(); 
    $i=0;
    while($row = mysqli_fetch_array($result)){
        
        $json["codCliente"] = $row[0];
        $json["pwd"] = $row[1];
        $json["nomCliente"] = $row[2];
        $json["apeCliente"] = $row[3];
        $json["abonoCliente"] = $row[4];
        $json["zonaCliente"] = $row[5];
        $json["fechaAbono"] = $row[6];
        $json["fenaClinte"] = $row[7];
        $json["saldoCliente"] = $row[8];
        $i++;
    }
    disconnectDB($conexion);
    return $json; 
}
        $myArray = getArraySQL($sql);
        
        
        echo json_encode($myArray);
?>
