<?php
   
  include_once('inc/mysqli.class.php');

  $id_pedido = $_POST['inputId'];
  $cliente = $_POST['inputCliente'];
  $tamanho = $_POST['inputTamanho'];
  $id_sabores = $_POST['inputSabor'];
  $forma_pgto = $_POST['inputPagamento'];
  $status = $_POST['inputStatus'];
  $observacao = $_POST['observacao'];

  $sql = "UPDATE pedidos
            SET id_cliente = $cliente,
            id_tamanho  = $tamanho,
            forma_pgto = $forma_pgto,
            id_status = $status,
            observacao = '$observacao'
          WHERE id = $id_pedido";

  $db->query($sql);
  

  if (!empty($id_sabores)){
    $sql = "DELETE FROM pedido_sabor WHERE id_pedidos = $id_pedido";
    $db->query($sql);

    foreach($id_sabores as $id_sabor){
      $sql = "INSERT INTO pedido_sabor (id, id_pedidos, id_sabor)
                          VALUES (0, $id_pedido, $id_sabor)";
      $db->query($sql);
    }
  }

  header("location: index.php?page=consulta_pedido");

?>