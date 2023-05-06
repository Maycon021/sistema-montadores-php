<?php

include("config.php");



 function retorna( $total )
  {
    $sql = "SELECT , `valor` 
      FROM `servicos` WHERE `nome` = '{$total}' ";

    $query = $conn->query( $sql );

    $arr = Array();
    if( $query->num_rows )
    {
      while( $dados = $query->fetch_object() )
      {
        $arr['total'] = $dados->total;
       
      }
    }
    else
      $arr['total'] = 'não encontrado';

    return json_encode( $arr );
  }



?>