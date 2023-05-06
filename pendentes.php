
<?php 

include_once("config.php");





if( isset($_GET['pesq_nome']) && $_GET['pesq_nome'] != ""){
  $pesq_nome = $_GET['pesq_nome'];
$pdo = $conn->query("SELECT cli.nome as clinome ,cli.endereco as cliendereco,cli.telefone as clitelefone, pag.pagamento ,mont.nome as montnome ,serv.servico,montag.movel ,montag.quantidade ,montag.total,montag.situacao,montag.data_montagem,montag.horas, montag.id as montagid FROM montagem as montag INNER JOIN clientes as cli ON cli.id = montag.clienteid INNER JOIN pagamento as pag ON pag.id = montag.pagamentoid INNER JOIN  montadores as mont ON mont.id = montag.montadorid INNER JOIN servicos as serv ON serv.id = montag.servicoid WHERE cli.nome ='$pesq_nome' AND montag.situacao ='Pendente' ");
$result = $pdo->fetchAll();


}
else{

$pdo = $conn->query("SELECT cli.nome as clinome ,cli.endereco as cliendereco,cli.telefone as clitelefone, pag.pagamento ,mont.nome as montnome ,serv.servico,montag.movel , montag.id as montid,montag.quantidade ,montag.total,montag.situacao,montag.data_montagem,montag.horas, montag.id as montagid FROM montagem as montag INNER JOIN clientes as cli ON cli.id = montag.clienteid INNER JOIN pagamento as pag ON pag.id = montag.pagamentoid INNER JOIN  montadores as mont ON mont.id = montag.montadorid INNER JOIN servicos as serv ON serv.id = montag.servicoid WHERE montag.situacao = 'Pendente' ");


$result = $pdo->fetchAll();




}




?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />







<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	<title>Agendamentos pendentes</title>

</head>
<body>
	<nav class="navbar navbar-light bg-dark  ">
  <a class="navbar-brand text-white" href="index.php">
    
    <i class="fa-sharp fa-solid fa-arrow-left"></i>
  </a>
</nav>



<div class="container pt-5">
    <h1> Pendentes</h1><br>  
	
	<div class="float-right mb-5" >
		<form class="form-inline my-2 my-lg-0" method="GET">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar nome" aria-label="Search" name="pesq_nome">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa-solid fa-magnifying-glass" name="pesquisar"></i></button>
    </form>
		
	</div>

	<table class="table">
  <thead class="bg-primary  text-white">
    <tr>
    
      <th scope="col">Cliente</th>
      <th scope="col">Endereco</th>
      <th scope="col">Telefone</th>
      <th scope="col">Pagamento</th>
      <th scope="col">Montador</th>
      <th scope="col">Servico</th>
      <th scope="col">Movel</th>
      <th scope="col">Qtd</th>
      <th scope="col">Total</th>
      <th scope="col">Situacao</th>
      <th scope="col">Data </th>
      <th scope="col">Horas</th>
      <th scope="col"> Concluir  </th>
     
    </tr>
  </thead>
  <?php foreach($result as $resultado) { ?>
  <tbody>
    <tr>
           <?php $id =$resultado['montid']; 

           ?>
          <td><?= $resultado['clinome']  ?> </td>
          <td><?= $resultado['cliendereco']  ?> </td>
          <td><?= $resultado['clitelefone']  ?> </td>
          <td><?= $resultado['pagamento']  ?> </td>
          <td><?= $resultado['montnome']  ?></td>
          <td><?= $resultado['servico']  ?></td>
          <td><?= $resultado['movel']  ?></td>
          <td><?= $resultado['quantidade']  ?></td>
          <td><?= $resultado['total']  ?></td>
          <td><?= $resultado['situacao']  ?></td>
          <td><?= $resultado['data_montagem']  ?></td>
          <td><?= $resultado['horas']  ?></td>

           <td> 

            <a class="btn " style= "margin: 0px; padding: 0px;" type="submit" href="assets/action_pendente.php?statu=Concluido&id=<?php echo $id ?>" role="button"><i class="fa-regular fa-circle-check text-success" ></i></a><a class="btn " type="submit" href="assets/action_pendente.php?statu=Cancelado&id=<?php echo $id ?>" role="button"> <i class="fa-solid fa-ban text-warning"></i> </a>

          
          
    </tr>
    
    
  </tbody>

<?php } ?>
</table>


 
    
  </tbody>
</table>
	

</div>






<!-- Modal cadastrar -->

 <?php  if(isset($_GET['cadastrar'])) {  ?>

<div class="modal  " tabindex="-1" role="dialog"  id="cadastrar">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agendar Montagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" action="assets/action_montagem.php">
          <div class="row">
            <div class="col-sm-4">
        	 <div class="form-group">
    <label for="exampleInputEmail1">Cliente</label>
   <select class="form-control"  name="cliente" >
   <?php   $pdo = $conn->query("SELECT nome,id FROM clientes  "); 
    $result = $pdo->fetchAll();

      foreach($result as $clientes) {

    ?>

     <option   value="<?= $clientes['id']; ?>"><?= $clientes['nome']; ?></option>

   <?php  } ?>
   </select>
   
  </div>
  </div>
  <div class="col-sm-4">
   <div class="form-group">
    <label >Pagamento</label>

     <select class="form-control"  name="pagamento" >
   <?php   $pdo = $conn->query("SELECT pagamento,id FROM pagamento  "); 
    $result = $pdo->fetchAll();

      foreach($result as $pagamento) {

    ?>

     <option   value="<?= $pagamento['id']; ?>"><?= $pagamento['pagamento']; ?></option>

   <?php  } ?>
   </select>
   
   
  </div>
  </div>
   <div class="col-sm-4">
   <div class="form-group">
    <label >Montador</label>
    <select class="form-control"  name="montador" >
   <?php   $pdo = $conn->query("SELECT nome,id FROM montadores  "); 
    $result = $pdo->fetchAll();

      foreach($result as $montador) {

    ?>

     <option   value="<?= $montador['id']; ?>"><?= $montador['nome']; ?></option>

   <?php  } ?>
   </select>
   </div>
  </div>
  <div class="col-sm-4">
  <div class="form-group">
    <label >Servico</label>
     <select  id="Servico" class="form-control"  name="servico"   >
   <?php   $pdo = $conn->query("SELECT servico,valor, id FROM servicos  "); 
    $result_servico = $pdo->fetchAll();
    $valor_servico;

      foreach($result_servico as $servico) {
       
    ?>

     <option   value="<?php echo  $servico['id']; ?>"><?php echo $servico['servico'];   ?>  </option>
 
   <?php   } ?>

   </select>
   
  </div>
</div>
 <div class="col-sm-4">
  <div class="form-group">
    <label >Movel</label>
    <input type="text" class="form-control"  name="movel"  placeholder="Digite o movel a ser montado">
   
  </div>
</div>
  <div class="col-sm-4">
  <div class="form-group">
    <label >Quantidade</label>

    <input type="text" class="form-control"   name="quantidade" placeholder="Digite  a quantidade de moveis ">
   
  </div>

<script >
  

</script>

</div>

   
    <div class="col-sm-3">
  <div class="form-group">
    <label >Data Montagem</label>
    <input type="date" class="form-control"  name="datamontagem" placeholder="">
   
  </div>
   </div>

    <div class="col-sm-2">
  <div class="form-group">
    <label >Horas</label>
    <input type="time" class="form-control"  name="horas" placeholder="">
   
  </div>
   </div>

 
       </div>
       <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar </button>
        <button type="reset" class="btn btn-primary">Limpar </button>
      </div>
       
        </form>
      </div>
     
    </div>
  </div>
</div>



<script type="text/javascript">$('#cadastrar').modal('show');


</script>
  <?php }  ?>
 




</body>
</html>
