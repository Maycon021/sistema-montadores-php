
<?php 

include_once("config.php");





if( isset($_GET['pesq_nome']) && $_GET['pesq_nome'] != ""){
  $pesq_nome = $_GET['pesq_nome'];
$pdo = $conn->query("SELECT * FROM clientes where nome='$pesq_nome' ");
$result = $pdo->fetchAll();


}
else{

$pdo = $conn->query("SELECT * FROM clientes ");


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

	<title>CADASTRO DE CLIENTES</title>

</head>
<body>
	<nav class="navbar navbar-light bg-dark  ">
  <a class="navbar-brand text-white" href="index.php">
    
    <i class="fa-sharp fa-solid fa-arrow-left"></i>
  </a>
</nav>



<div class="container pt-5">
    <h1> Clientes</h1><br>  
	<div class="float-left" >
			<a class="btn btn-success pl-5 pr-5" href="?cadastrar" role="button">ADICIONAR</a>
		
	</div>
	<div class="float-right mb-5" >
		<form class="form-inline my-2 my-lg-0" method="GET">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Search" name="pesq_nome">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa-solid fa-magnifying-glass" name="pesquisar"></i></button>
    </form>
		
	</div>

	<table class="table">
  <thead class="bg-primary  text-white">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nome</th>
      <th scope="col">Endereco</th>
      <th scope="col">Cpf</th>
      <th scope="col">Bairro</th>
      <th scope="col">Cidade</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th scope="col">Data Cadastro</th>
    </tr>
  </thead>
  <?php foreach($result as $resultado) { ?>
  <tbody>
    <tr>
      <th scope="row"> <?= $resultado['id']  ?></th>
      <td><?= $resultado['nome']  ?> </td>
      <td><?= $resultado['endereco']  ?> </td>
      <td> <?= $resultado['cpf']  ?></td>
       <td> <?= $resultado['bairro']  ?></td>
        <td> <?= $resultado['cidade']  ?></td>
         <td> <?= $resultado['email']  ?></td>
         <td> <?= $resultado['telefone']  ?></td>
         <td> <?= $resultado['data']  ?></td>
    </tr>
    
    
  </tbody>

<?php } ?>
</table>


 
    
  </tbody>
</table>
	

</div>






<!-- Modal cadastrar -->

 <?php  if(isset($_GET['cadastrar'])) {  ?>
<div class="modal" tabindex="-1" role="dialog"  id="cadastrar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar Clientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="assets/action_clientes.php">
        	 <div class="form-group">
    <label for="exampleInputEmail1">Nome</label>
    <input type="text" class="form-control"  name="nome" placeholder="Digite nome">
   
  </div>
   <div class="form-group">
    <label >Endereco</label>
    <input type="text" class="form-control"  name="endereco" placeholder="Digite o endereco">
   
  </div>
   <div class="form-group">
    <label >Cpf</label>
    <input type="text" class="form-control"   name="cpf" placeholder="Digite o cpf">
   
  </div>
  <div class="form-group">
    <label >Bairro</label>
    <input type="text" class="form-control"   name="bairro" placeholder="Digite o Bairro">
   
  </div>
  <div class="form-group">
    <label >Cidade</label>
    <input type="text" class="form-control"  name="cidade"  placeholder="Digite a cidade">
   
  </div>
  <div class="form-group">
    <label >Email</label>
    <input type="email" class="form-control"   name="email" placeholder="Digite  o email">
   
  </div>
  <div class="form-group">
    <label >Telefone</label>
    <input type="text" class="form-control"  name="telefone" placeholder="Digite o telefone">
   
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