<?php


require_once("../config.php");




if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['funcao']) && isset($_POST['telefone']) && isset($_POST['cpf']) && isset($_POST['endereco']) ){



$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$funcao = $_POST['funcao'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];



$pdo = $conn->prepare("INSERT INTO montadores (nome,email,senha,funcao,telefone,cpf,endereco) VALUES (:nome,:email,:senha,:funcao,:telefone,:cpf,:endereco)");

$pdo->bindValue(":nome", $nome);
$pdo->bindValue(":email", $email);
$pdo->bindValue(":senha", $senha);
$pdo->bindValue(":funcao", $funcao);
$pdo->bindValue(":telefone", $telefone);
$pdo->bindValue(":cpf", $cpf);
$pdo->bindValue(":endereco", $endereco);
$pdo->execute();




}

header("Location: ../montador.php");

