<?php
$con = new mysqli("localhost", "root", "", "projetopw2");

if ($con->connect_error) {
    die("Erro na conexão: " . $con->connect_error);
}

$email  = $_POST['email'] ?? '';
$cidade = $_POST['cidade'] ?? '';

$nome      = "";
$rg        = "";
$telefone  = "";
$dataNasci = "";

$sql = "INSERT INTO cadastro_passageiro (nome_passageiro, rg_passageiro, cidade_passageiro, telefone_passageiro, email_passageiro, dataNasci_passageiro)VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $con->prepare($sql);

if (!$stmt) {
    die("Erro no prepare: " . $con->error);
}

$stmt->bind_param("ssssss", $nome, $rg, $cidade, $telefone, $email, $dataNasci);

if ($stmt->execute()) {
    echo "<script> alert('Cadastro realizado com sucesso!'); window.location.href = '../index.html'; </script>";
} else {
    echo 'Erro ao salvar: ' . $stmt->error;
}

?>
