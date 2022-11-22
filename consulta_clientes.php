<?php
  $sql = "select * from clientes";
  $clientes = $db->get_results($sql);

  //print_r($sabor);
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Endereco</th>
      <th scope="col">dt_cadastro</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>   
  <?php

  if (!empty($clientes)){
      foreach($clientes as $reg){
  ?>
  
  
    <tr>
      <th scope="row"><?php echo $reg->id; ?></th>
      <td><?php echo $reg->nome; ?></td>
      <td><?php echo $reg->telefone; ?></td>
      <td><?php echo $reg->endereco; ?></td>
      <td><?php echo $reg->dt_cadastro; ?></td>
      <td>
         <a class="btn btn-primary" href="index.php?page=alterar_clientes&id=<?php echo $reg->id; ?>" role="button">Editar</a> 
         <a class="btn btn-danger" href="index.php?page=excluir_clientes&id=<?php echo $reg->id; ?>" onclick="return confirm ('Deseja excluir?')" role="button">Excluir</a>
      </td> 
    </tr>
  
    <?php
      }
    }
  ?>

  </tbody>
</table>
