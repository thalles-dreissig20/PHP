<?php
   
  include_once('inc/mysqli.class.php');
  include_once('inc/funcao.php');
  
  $id = $_POST['inputId'];
  $tamanho = $_POST['tamanho'];
  $valor = Troca_Virgula($_POST['valor']);
  $status = ($_POST['status']);


  //$sql = "UPDATE tamanhos (id, tamanho, valor, status) VALUES (0, '$tamanho', $valor, '$status')";

  $sql = "UPDATE tamanhos SET tamanho = '$tamanho', valor = $valor, status = '$status' WHERE id = $id";

  $db->query($sql);

  header("location: index.php?page=consulta_tamanho");



?>