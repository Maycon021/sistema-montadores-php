
<?php 

include_once("config.php");








$pdo = $conn->query("SELECT * FROM servicos ");


$result = $pdo->fetchAll();








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

	<title>CADASTRO DE SERVICOS</title>

</head>
<body>
	<nav class="navbar navbar-light bg-dark  ">
  <a class="navbar-brand text-white" href="index.php">
    
    <i class="fa-sharp fa-solid fa-arrow-left"></i>
  </a>
</nav>

<div class="container pt-5">
  <h1> Servicos</h1><br>  
	<div class="float-left" >
			<a class="btn btn-success pl-5 pr-5" href="?cadastrar" role="button">ADICIONAR</a>
		
	</div>
  <br> <br>
	

	<table class="table">
  <thead class="bg-primary  text-white">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Servico</th>
      <th scope="col">Descricao</th>
      <th scope="col">Valor</th>
      <th scope="col">Acoes</th>
    </tr>
  </thead>
  <?php foreach($result as $resultado) { ?>
  <tbody>
    <tr>
      <th scope="row"> <?= $resultado['id']  ?></th>
      <td><?= $resultado['servico']  ?> </td>
      <td><?= $resultado['descricao']  ?> </td>
      <td> <?= $resultado['valor']  ?></td>
      <td> <i   class=" bg-danger  p-1 text-white fa-solid fa-trash"></i></td>
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
        <h5 class="modal-title">Cadastrar Servicos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="assets/action_servico.php">
        	 <div class="form-group">
    <label for="exampleInputEmail1">Servico</label>
    <input type="text" class="form-control"  name="servico" placeholder="Digite servico">
   
  </div>
   <div class="form-group">
    <label >Descricao</label>
    <input type="text" class="form-control"  name="descricao" placeholder="Digite uma descricao">
   
  </div>
   <div class="form-group">
    <label >Valor</label>
    <input type="text" class="form-control"   name="valor" placeholder="Digite um valor">
   
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