<?php
$con = new mysqli("localhost", "root", "", "projetopw2");

if ($con->connect_error) {
    die("Erro: " . $con->connect_error);
}

if (!isset($_GET['id'])) {
    die("<script>alert('ID não informado!'); window.location='index.html';</script>");
}

$id = $_GET['id'];

$sql = "SELECT * FROM passagem_multi WHERE id_passagem = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$dados = $result->fetch_assoc();

if (!$dados) {
    die("<script>alert('Passagem não encontrada!'); window.location='../index.html';</script>");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resumo - Multidestino</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #5a0c4d;
            font-size: 32px;
            font-weight: bold;
        }

        .box-resumo {
            width: 60%;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            border: 2px solid #dcdcdc;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.08);
        }

        .box-resumo p {
            font-size: 20px;
            margin: 12px 0;
            color: #333;
        }

        .box-resumo b {
            color: #5a0c4d;
        }

        .btn {
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: 0.2s;
            font-size: 18px;
            margin-top: 20px;
        }

        .btn.secundario {
            background: #7d3169;
            color: white;
        }
    </style>
</head>
<body>

<h1>Resumo da Passagem Multidestino</h1>

<div class="box-resumo">
    
    <p><b>ID da Passagem:</b> <?= $dados['id_passagem'] ?></p>
    <hr>

    <p><b>Origem 1:</b> <?= $dados['origem1_passagem'] ?></p>
    <p><b>Destino 1:</b> <?= $dados['destino1_passagem'] ?></p>

    <br>
    <p><b>Origem 2:</b> <?= $dados['origem2_passagem'] ?></p>
    <p><b>Destino 2:</b> <?= $dados['destino2_passagem'] ?></p>
    <br>

    <p><b>Data da Ida:</b> <?= $dados['data_ida'] ?></p>
    <p><b>Classe:</b> <?= $dados['passagem_classe'] ?></p>

    <button type="button" class="btn secundario" onclick="window.location.href='../index.html'">Voltar</button>

</div>

</body>
</html>
