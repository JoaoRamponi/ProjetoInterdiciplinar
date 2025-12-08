<?php
// Recebe os dados da página IDA
$origem = $_POST['origem'] ?? '';
$destino = $_POST['destino'] ?? '';
$classe = $_POST['classe'] ?? '';
$data_ida = $_POST['data_ida'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Resumo da Ida</title>

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
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        transition: 0.2s;
    }


    .btn.secundario {
        background: #7d3169;
        color: white;
    }
</style>

</head>
<body>

<h1>Resumo da Passagem – IDA</h1>

<div class="box-resumo">
    <p><span class="label">Origem:</span> <?= $origem ?></p>
    <p><span class="label">Destino:</span> <?= $destino ?></p>
    <p><span class="label">Classe da Passagem:</span> <?= $classe ?></p>
    <p><span class="label">Data de Ida:</span> <?= $data_ida ?></p>

    <button type="button" class="btn secundario" onclick="window.location.href='../index.html'">Voltar</button>
</div>

</body>
</html>
