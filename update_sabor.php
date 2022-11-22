<?php
   
  include_once('inc/mysqli.class.php');
  include_once('inc/funcao.php');
  
  $id = $_POST['inputId'];
  $nome_sabor = $_POST['nome_sabor'];
  $ingredientes = ($_POST['ingredientes']);
  $status = ($_POST['status']);


  //$sql = "UPDATE tamanhos (id, tamanho, valor, status) VALUES (0, '$tamanho', $valor, '$status')";

  $sql = "UPDATE sabor SET nome_sabor = '$nome_sabor', ingredientes = '$ingredientes', status = '$status' WHERE id = $id";

  $db->query($sql);

  header("location: index.php?page=consulta_sabor");



?>