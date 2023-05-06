
<?php 

require("config.php");





?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DASHBOARD</title>
  <link rel="stylesheet" type="text/css" href="dashboard.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>


<div class="topo"> 
 

<p> Bem vindo! -  maycon@hotmail.com</p>

</div>


  
  <div class="menu">
     <ul>
      <li><a href="montador.php">Montador </a> </li>
       <li> <a href="clientes.php">Clientes </a></li>
       <li><a href="servicos.php">Servicos </a> </li>
       <li><a href="pagamento.php"> Pagamento </a> </li>
       
       <li><a href="montagem.php">Agendar Montagem  </a></li>
       <li><a href="pendentes.php">Pendentes </a></li>
       <li><a href="concluidos.php">Lucros </a> </li>
       <li><a href="montagem.php">Consultar </a></li>
       <li><a href="montagem.php">Movimentacao </a></li>
       
       

        <li><a href="#">Sair </a> </li>
     </ul>





</div>

<div class="conteudo">

<div class="cards">
  
<h1>Informações a ser Analisada</h1>

  <div class="item-card clientes" > 
    <h3> <i class="fa-solid fa-user" style="padding-right: 2px; color: red;"></i>Clientes</h3>

    <?php 
    $pdo = $conn->query("SELECT * FROM clientes");  

    $result = $pdo->fetchAll(); ?>

    <p class="contagem"> <?php   echo count($result);   ?> </p>
   


     

  </div>
  <div class="item-card pendentes" ><h3> <i  class="fa-solid fa-pause" style="padding-right: 1px; color: red;" > </i> Pendente</h3>
     <?php 
    $pdo = $conn->query("SELECT * FROM montagem WHERE situacao='Pendente' ");  

    $result = $pdo->fetchAll(); ?>

    <p class="contagem"> <?php   echo count($result);   ?> </p>

  </div>
  <div class="item-card concluidas" style=""> <h3><i class="fa-solid fa-check" style="padding-right: 1px; color: red;"> </i> Concluidas Hj</h3>
  <?php 
    $pdo = $conn->query("SELECT * FROM montagem WHERE situacao='Concluido'  AND data_montagem= CURDATE()");  

    $result = $pdo->fetchAll(); ?>

    <p class="contagem"> <?php   echo count($result);   ?> </p>

  </div>
  <div  style=" " class="item-card lucros"  > <h3> <i class="fa-solid fa-sack-dollar" style="padding-right: 5px; color: red;"></i>Lucros Hoje</h3>  <?php 
    $pdo = $conn->query("SELECT SUM(total) as soma FROM montagem WHERE situacao='Concluido' AND data_montagem = CURDATE()  ");  

    $result = $pdo->fetch(); ?>

    <p class="contagem"> R$ <?php  echo  0 + $result['soma'] ;     ?> </p></div>
</div>  

</div>






</body>
</html>