<?php
   
  include_once('inc/mysqli.class.php');
  include_once('inc/funcao.php');
  
  $id = $_POST['inputId'];
  $nome = $_POST['nome'];
  $telefone = ($_POST['telefone']);
  $endereco = ($_POST['endereco']);
  $dt_cadastro = ($_POST['dt_cadastro']);


  //$sql = "UPDATE tamanhos (id, tamanho, valor, status) VALUES (0, '$tamanho', $valor, '$status')";

  $sql = "UPDATE clientes SET nome = '$nome', telefone = $telefone, endereco = '$endereco', dt_cadastro = '$dt_cadastro' WHERE id = $id";

  $db->query($sql);

  header("location: index.php?page=consulta_clientes");



?>