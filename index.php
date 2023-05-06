<?php 

require("config.php");

$pdo = $conn->query("SELECT * FROM montagem WHERE situacao='Concluido' limit 5");

$result2 = $pdo->fetchAll();

?>



<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Hugo Vasconcelos">

        <title>Painel Administrativo</title>

        <!-- Custom fonts for this template-->
        <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="./css/sb-admin-2.min.css" rel="stylesheet">
        <link href="./css/style.css" rel="stylesheet">
        
        <link href="./vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


        <!-- Bootstrap core JavaScript-->
        <script src="./vendor/jquery/jquery.min.js"></script>
        <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
         <link rel="shortcut icon" href="././img/favicon0.ico" type="image/x-icon">
    <link rel="icon" href="././img/favicon0.ico" type="image/x-icon">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">

                    <div class="sidebar-brand-text mx-3">Administrador</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">



                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Cadastros e consultas em geral
                </div>



                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-users"></i>
                        <span>Cadastros  geral</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">telas</h6>
                            <a class="collapse-item" href="clientes.php">Clientes</a>
                            <a class="collapse-item" href="montador.php">Montador</a>
                            <a class="collapse-item" href="pagamento.php">Formas pagamentos</a>
                            <a class="collapse-item" href="servicos.php">Servicos</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-home"></i>
                        <span>Gerenciar</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Telas</h6>
                            <a class="collapse-item" href="montagem.php">Agendar montagem</a>
                            <a class="collapse-item" href="pendentes.php">Pendentes</a>
                            <a class="collapse-item" href="concluidos.php">Consultar lucros</a>
                            <a class="collapse-item" href="consultas.php">Consultas</a>

                        </div>
                    </div>
                </li>

                
               



                <!-- Nav Item - Charts -->
                

                <!-- Nav Item - Tables -->
              

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                   <a href="clientes.php"> SAIR </a>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <img class="mt-2" src="./img/montador.jpg" width="75" height="60">



                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">



                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">maycon@hotmail.com</span>
                                    <!--<img class="img-profile rounded-circle" src="../img/sem-foto.jpg"> -->

                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#ModalPerfil">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-primary"></i>
                                        Editar Perfil
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../logout.php">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                                        Sair
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>


                

   
 <div class="container-fluid">
  <div class="row ">
    <div class="col-sm-3 ">
     <div class="card  bg-info " style=" font-size: 28px;width: 100%;  ">
  <div class="card-body text-white ">
    <h5 class="card-title text-center">Clientes</h5>
    <p class="card-text text-center  "><?php 
    $pdo = $conn->query("SELECT * FROM clientes");  

    $result = $pdo->fetchAll(); 

       echo count($result);   ?> </p>
    <a href="clientes.php " class=" btn btn-danger  ">cliente</a>
  </div>
</div>
    </div>
    <div class="col-sm-3">
      <div class="card bg-warning" style=" font-size: 28px; width: 100%;  ">
  <div class="card-body text-white">
    <h5 class="card-title text-center">Pendentes</h5>
    <p class="card-text text-center"><?php 
    $pdo = $conn->query("SELECT * FROM montagem WHERE situacao='Pendente' ");  

    $result = $pdo->fetchAll(); 
    echo count($result); ?>

</p>
    <a href="#" class="btn btn-danger p-0">ir para os pendentes</a>
  </div>
</div>
    </div>
    <div class="col-sm-3 ">
      <div class="card bg-primary text-white" style=" font-size: 28px;width: 100%; ">
  <div class="card-body">
    <h5 class="card-title text-center">Concluidas Hoje</h5>
    <p class="card-text text-center"><?php 
    $pdo = $conn->query("SELECT * FROM montagem WHERE situacao='Concluido'  AND data_montagem= CURDATE()");  

    $result = $pdo->fetchAll(); 

    echo count($result);   
    ?>

    </p>
    <a href="# " class="btn btn-danger p-0">consultar </a>
  </div>
</div>
    </div>
      <div class="col-sm-3">
      <div class="card bg-success text-white" style="font-size: 28px;width: 100%; ">
  <div class="card-body">
    <h5 class="card-title text-center">Lucros do Dia</h5>
    <p class="card-text text-center">
        R$<?php 
    $pdo = $conn->query("SELECT SUM(total) as soma FROM montagem WHERE situacao='Concluido' AND data_montagem = CURDATE()  "); 
    $result = $pdo->fetch();
     echo  0 + $result['soma'] ;     ?>

     </p>
    <a href="#" class="btn btn-danger p-0" >Consultar lucros</a>
  </div>
</div>
    </div>





  </div>







</div>

    <h2  class=" pl-2 mt-5">As ultimas montagens concluidas:</h2>
<table class="table table-striped mt-3">
  <thead>
    <tr>
      
     
     
      <th scope="col">movel</th>
      <th scope="col">total</th>
      
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach ($result2 as $concluido) { ?>

        <tr>
        
          <td> <?php echo $concluido['movel']; ?></td>
          <td> <?php echo $concluido['total']; ?></td>

           </tr>
   <?php  }  ?>

   
  
  </tbody>
</table>



  








                   
                   
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->



            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>




        <!--  Modal Perfil-->
        


        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/chart-area-demo.js"></script>
        <script src="../js/demo/chart-pie-demo.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/datatables-demo.js"></script>

    </body>

</html>



