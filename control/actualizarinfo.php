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

$sql = "UPDATE clientes SET nomCliente='".$_POST['nombre']."', apeCliente='".$_POST['apellido']."', fenaCliente='".$_POST['fechanacimiento']."' where codCliente= ".$_SESSION["codCliente"];
$_SESSION["nombre"]=strtolower($_POST['nombre']);
$_SESSION["nombreCompleto"]=$_POST['nombre']. " ".$_POST['apellido'];

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

        header('Location: /control/index.php');    
?>
