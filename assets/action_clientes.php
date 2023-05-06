<?php


require_once("../config.php");




if(isset($_POST['nome']) && isset($_POST['endereco']) && isset($_POST['cpf']) && isset($_POST['bairro']) && isset($_POST['cidade']) && isset($_POST['email']) && isset($_POST['telefone']) ){



$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cpf = $_POST['cpf'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];



$pdo = $conn->prepare("INSERT INTO clientes (nome,endereco,cpf,bairro,cidade,email,telefone,data) VALUES (:nome,:endereco,:cpf,:bairro,:cidade,:email,:telefone,CURDATE())");

$pdo->bindValue(":nome", $nome);
$pdo->bindValue(":endereco", $endereco);
$pdo->bindValue(":cpf", $cpf);
$pdo->bindValue(":bairro", $bairro);
$pdo->bindValue(":cidade", $cidade);
$pdo->bindValue(":email", $email);
$pdo->bindValue(":telefone", $telefone);

$pdo->execute();




}

header("Location: ../clientes.php");

