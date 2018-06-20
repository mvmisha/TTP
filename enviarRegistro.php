<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ttp";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `clientes` (`pwd`, `nomCliente`, `apeCliente`, `abonoCliente`, `zonaAbono`, `fenaCliente`) VALUES ('".$_POST['pwd']."', '".$_POST['nombre']."','".$_POST['apellido']."', '0', 'A1', '".$_POST['fechanacim']."')";

if ($conn->query($sql) === TRUE) {
    $target_dir = "img/";
    $imgname = $_POST['nombre']."_".$_POST['apellido'];
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if (move_uploaded_file($_FILES["fileToUpload"][$imgname], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
    <?php header("location:/index.html"); ?>
