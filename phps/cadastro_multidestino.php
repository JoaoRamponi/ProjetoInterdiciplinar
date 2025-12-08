<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "projetopw2";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Erro na conexão: " . $con->connect_error);
}

$origem1  = $_POST['origem1'];
$origem2  = $_POST['origem2'];

$destino1 = $_POST['destino1'];
$destino2 = $_POST['destino2'];

$data_ida = $_POST['data_ida'];  
$classe = $_POST['classe'];

$sql = "INSERT INTO passagem_multi (origem1_passagem,origem2_passagem,destino1_passagem,destino2_passagem,data_ida,passagem_classe) VALUES ('$origem1','$origem2','$destino1','$destino2','$data_ida','$classe')";

if ($con->query($sql) === TRUE) {
    $id = $con->insert_id;
    header("Location: resumoMulti.php?id=" . $id);
    exit();
} else {
    echo "Erro ao salvar: " . $con->error;
}

$con->close();
?>
