<?php
   
  include_once('inc/mysqli.class.php');
  include_once('inc/funcao.php');
  

  $nome = $_POST['nome'];
  $telefone = ($_POST['telefone']);
  $endereco = ($_POST['endereco']);


  //$sql = "INSERT INTO clientes (id, nome, telefone, endereco, dt_cadastro) VALUES (0, '$nome', $telefone, '$endereco', '$dt_cadastro')";
  
  
  $sql = "INSERT INTO clientes (id, nome, telefone, endereco, dt_cadastro)
   VALUES (0, '$nome', '$telefone', '$endereco', now())";
  

  $db->query($sql);
  
   

  header("location: index.php?page=consulta_clientes");


?>