<?php
$con = new mysqli("localhost", "root", "", "projetopw2");

if ($con->connect_error) {
    die("Erro: " . $con->connect_error);
}

$origem1 = $_POST['origem1_passagem'];
$destino1 = $_POST['destino1_passagem'];
$origem2 = $_POST['origem2_passagem'];
$destino2 = $_POST['destino2_passagem'];
$dataIda = $_POST['data_ida'];
$classe = $_POST['passagem_classe'];

$sql = "INSERT INTO passagem_multi 
(origem1_passagem, destino1_passagem, origem2_passagem, destino2_passagem, data_ida, passagem_classe)
VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $con->prepare($sql);

$stmt->bind_param("ssssss", $origem1, $destino1, $origem2, $destino2, $dataIda, $classe);

if ($stmt->execute()) {
    $id = $con->insert_id;
    echo "<script>alert('Passagem cadastrada com sucesso!'); window.location='../resumoMulti.php?id=$id';</script>";
} else {
    echo "<script>alert('Erro ao cadastrar'); window.location='../index.html';</script>";
}
?>
