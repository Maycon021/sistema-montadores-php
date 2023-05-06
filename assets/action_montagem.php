<?php


require_once("../config.php");




if(isset($_POST['cliente']) && isset($_POST['pagamento']) && isset($_POST['montador']) && isset($_POST['servico']) && isset($_POST['movel']) && isset($_POST['quantidade'])  && isset($_POST['datamontagem']) && isset($_POST['horas']) ){



$cliente = $_POST['cliente'];
$pagamento = $_POST['pagamento'];
$montador = $_POST['montador'];
$servico = $_POST['servico'];
$movel = $_POST['movel'];
$quantidade = $_POST['quantidade'];

$datamontagem = $_POST['datamontagem'];
$horas = $_POST['horas'];



//totalizar o total da montagem
$quantidade;
$total;

$pdo = $conn->query("SELECT * FROM servicos WHERE id='$servico' ");

echo $servico;
$resultado = $pdo->fetchAll();


echo $total = $quantidade * $resultado[0]['valor'];
	


$pdo = $conn->prepare("INSERT INTO montagem (clienteid,pagamentoid,montadorid,servicoid,movel,quantidade,total,situacao,data_montagem,horas,data) VALUES (:cliente,:pagamento,:montador,:servico,:movel,:quantidade,:total,:situacao,:datamontagem,:horas,CURDATE())");

$pdo->bindValue(":cliente", $cliente);
$pdo->bindValue(":pagamento", $pagamento);
$pdo->bindValue(":montador", $montador);
$pdo->bindValue(":servico", $servico);
$pdo->bindValue(":movel", $movel);
$pdo->bindValue(":quantidade", $quantidade);
$pdo->bindValue(":total",$total) ;
$pdo->bindValue(":situacao", "Pendente");
$pdo->bindValue(":datamontagem", $datamontagem);
$pdo->bindValue(":horas", $horas);
$pdo->execute();




}

header("Location: ../montagem.php");

