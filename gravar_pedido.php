<?php
   
  include_once('inc/mysqli.class.php');

  $cliente = $_POST['inputCliente'];
  $tamanho = $_POST['inputTamanho'];
  $id_sabores = $_POST['inputSabor'];
  $forma_pgto = $_POST['inputPagamento'];
  $status = $_POST['inputStatus'];
  $observacao = $_POST['observacao'];

  $sql = "INSERT INTO pedidos (id, id_cliente, id_tamanho, forma_pgto, valor_total, id_status, dt_pedido, observacao)
                       VALUES (0, $cliente, $tamanho, $forma_pgto, 0, $status , now() , '$observacao')";
 
  $db->query($sql);
  $id_pedido = $db->getInsertId();
  
  if (!empty($id_sabores)){
    foreach($id_sabores as $id_sabor){
      $sql = "INSERT INTO pedido_sabor (id, id_pedidos, id_sabor)
                                VALUES (0, $id_pedido, $id_sabor)";

      $db->query($sql);
    }
  }


  header("location: index.php?page=consulta_pedido");


?>