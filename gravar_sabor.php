<?php
   
  include_once('inc/mysqli.class.php');
  include_once('inc/funcao.php');
  

  $nome_sabor = $_POST['sabor'];
  $ingredientes = ($_POST['ingredientes']);
  $status = Formata_Status($_POST['status']);


  $sql = "INSERT INTO sabor (id, nome_sabor, ingredientes, status) VALUES (0, '$nome_sabor', '$ingredientes', '$status')";

  $db->query($sql);

  header("location: index.php?page=consulta_sabor");


?>