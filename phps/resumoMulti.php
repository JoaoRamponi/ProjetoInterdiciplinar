<?php
$con = new mysqli("localhost", "root", "", "projetopw2");

$id = $_GET['id'];

$sql = "SELECT * FROM passagem_multi WHERE id_passagem = $id";
$result = $con->query($sql);
$dados = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Resumo Multidestino</title>

<style>
body{
    font-family: Arial;
    background:#fff;
    margin:0;
    padding:0;
}
h1{
    text-align:center;
    color:#5a0c4d;
    margin-top:20px;
}
.box-resumo{
    width:70%;
    margin:30px auto;
    padding:25px;
    background:#ffffff;
    border:2px solid #d8d8d8;
    border-radius:15px;
    font-size:18px;
    line-height:28px;
    color:#333;
}
box-resumo p b {
    color:#5a0c4d;
}
</style>

</head>
<body>

<h1>Resumo Multidestino</h1>

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

</div>

</body>
</html>
