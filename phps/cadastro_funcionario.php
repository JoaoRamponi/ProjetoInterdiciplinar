<?php
$con = new mysqli("localhost", "root", "", "projetopw2");

if ($con->connect_error) {
    die("Erro na conexão: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome_funcionario'];
    $rg = $_POST['rg_funcionario'];
    $cidade = $_POST['cidade_funcionario'];
    $telefone = $_POST['telefone_funcionario'];
    $email = $_POST['email_funcionario'];
    $dataNasc = $_POST['dataNasci_funcionario'];

    $stmt = $con->prepare("INSERT INTO cadastro_funcionario 
        (nome_funcionario, rg_funcionario, cidade_funcionario, telefone_funcionario, email_funcionario, dataNasci_funcionario) 
        VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssss", $nome, $rg, $cidade, $telefone, $email, $dataNasc);

    if ($stmt->execute()) {
        echo "<script>alert('Funcionário cadastrado com sucesso!'); window.location='../index.html';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar funcionário.');</script>";
    }

    $stmt->close();
}

$con->close();
?>
