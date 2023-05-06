<?php


require_once("../config.php");




if(isset($_POST['servico']) && isset($_POST['descricao'])  &&  isset($_POST['valor']) ){



$servico = $_POST['servico'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];



$pdo = $conn->prepare("INSERT INTO servicos (servico,descricao,valor) VALUES (:servico,:descricao,:valor)");

$pdo->bindValue(":servico", $servico);
$pdo->bindValue(":descricao", $descricao);
$pdo->bindValue(":valor", $valor);


$pdo->execute();




}


header("Location: ../servicos.php");

