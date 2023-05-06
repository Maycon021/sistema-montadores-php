<?php


require_once("../config.php");




if(isset($_POST['pagamento']) && isset($_POST['descricao'])   ){



$pagamento = $_POST['pagamento'];
$descricao = $_POST['descricao'];




$pdo = $conn->prepare("INSERT INTO pagamento (pagamento,descricao) VALUES (:pagamento,:descricao)");

$pdo->bindValue(":pagamento", $pagamento);
$pdo->bindValue(":descricao", $descricao);



$pdo->execute();




}


header("Location: ../pagamento.php");

