<?php
   
  include_once('inc/mysqli.class.php');
  include_once('inc/funcao.php');
  

  $tamanho = $_POST['tamanho'];
  $valor = Troca_Virgula($_POST['valor']);
  $status = Formata_Status($_POST['status']);


  $sql = "INSERT INTO tamanhos (id, tamanho, valor, status) VALUES (0, '$tamanho', $valor, '$status')";

  $db->query($sql);

  header("location: index.php?page=consulta_tamanho");



?>