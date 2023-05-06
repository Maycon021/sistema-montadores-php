


<?php
require_once("../config.php");

if(isset($_GET['statu']) && $_GET['statu'] == "Concluido"){

$id = $_GET['id'];

$pdo = $conn->prepare("UPDATE montagem  SET situacao=:situacao, data_montagem=CURDATE() WHERE id = :id");

$pdo->bindValue("situacao", "Concluido");
$pdo->bindValue("id", $id);
$pdo->execute();

	
}

else if(isset($_GET['statu']) && $_GET['statu'] == "Cancelado"){


$id = $_GET['id'];

$pdo = $conn->prepare("UPDATE montagem  SET situacao=:situacao, data_montagem=CURDATE() WHERE id = :id");

$pdo->bindValue("situacao", "Cancelado");
$pdo->bindValue("id", $id);
$pdo->execute();

}

header("Location:../pendentes.php");


?>


