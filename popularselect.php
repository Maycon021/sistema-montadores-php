<?php 

include("config.php");



$servico_id = $_GET['id'];


$pdo = $conn->prepare("SELECT valor, id FROM servicos WHERE id= :id");
$pdo->bindValue(":id", $servico_id);

$pdo->execute();

$registros = $pdo->fetchAll(PDO::FETCH_ASSOC);
$id['id'] = $registros['id'];
return json_encode($id);


foreach($registros as $option){ ?>

	<option value="<?php echo $option['id'] ?>"><?php echo $option['valor'] ?> </option>

 <?php } ?>