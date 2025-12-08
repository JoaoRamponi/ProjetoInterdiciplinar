<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "projetopw2";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Erro na conexão: " . $con->connect_error);
}

$origem  = $_POST['origem'];
$destino = $_POST['destino'];
$data_ida = $_POST['data_ida'];
$data_volta = $_POST['data_volta'];
$classe = $_POST['classe'];

$sql = "INSERT INTO passagem (origem_passagem, destino_passagem, data_ida, data_volta, passagem_classe)
        VALUES ('$origem', '$destino', '$data_ida', '$data_volta', '$classe')";

if ($con->query($sql) === TRUE) {
    $id = $con->insert_id;
    header("Location: resumo.php?id=" . $id);
    exit();
} else {
    echo "Erro ao salvar: " . $con->error;
}

$con->close();
?>
