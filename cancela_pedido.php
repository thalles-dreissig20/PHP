<?php
   
  include_once('inc/mysqli.class.php');
  
  $id = $_GET['id'];

  $sql = "UPDATE pedidos 
          SET id_status = 4  
          WHERE id= $id";

  $db->query($sql);

  header("location: index.php?page=consulta_pedido");



?>