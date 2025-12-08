<?php
$con = new mysqli("localhost", "root", "", "projetopw2");

if ($con->connect_error) {
    die("Erro na conexão: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome_passageiro'];
    $rg = $_POST['rg_passageiro'];
    $cidade = $_POST['cidade_passageiro'];
    $telefone = $_POST['telefone_passageiro'];
    $email = $_POST['email_passageiro'];
    $dataNasc = $_POST['dataNasci_passageiro'];

    $stmt = $con->prepare("INSERT INTO cadastro_passageiro 
        (nome_passageiro, rg_passageiro, cidade_passageiro, telefone_passageiro, email_passageiro, dataNasci_passageiro) 
        VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssss", $nome, $rg, $cidade, $telefone, $email, $dataNasc);

    if ($stmt->execute()) {
        echo "<script>alert('Passageiro cadastrado com sucesso!'); window.location='../index.html';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar Passageiro.');</script>";
    }

    $stmt->close();
}

$con->close();
?>
