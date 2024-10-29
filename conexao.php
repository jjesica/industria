<?php 
$servername = "localhost";
$database = "db_Industrias";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Conexão Falhou: " . mysqli_connect_error());
}
?>
