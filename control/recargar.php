<?php 
session_start();
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ttp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "update clientes set abonoCliente=1,fechaAbono=NOW(),zonaAbono='". $_POST['zonaAbono']."' where codCliente= ".$_SESSION["codCliente"];
//$sql = "update clientes set abonoCliente=1,fechaAbono='2018-01-01' where codCliente= ".$_SESSION["codCliente"];

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
<?php header("location:/control"); ?>
