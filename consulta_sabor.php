<?php
$sql = "select * from sabor";
$sabor = $db->get_results($sql);

//print_r($sabor);
?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sabor</th>
      <th scope="col">Ingredientes</th>
      <th scope="col">Status</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>   
  <?php

  if (!empty($sabor)){
      foreach($sabor as $reg){
  ?>
  
  
    <tr>
      <th scope="row"><?php echo $reg->id; ?></th>
      <td><?php echo $reg->nome_sabor; ?></td>
      <td><?php echo $reg->ingredientes; ?></td>
      <td><?php echo Formata_Status($reg->status); ?></td>
      <td>
      <td>
         <a class="btn btn-primary" href="index.php?page=alterar_sabor&id=<?php echo $reg->id; ?>" role="button">Editar</a> 
         <a class="btn btn-danger" href="index.php?page=excluir_sabor&id=<?php echo $reg->id; ?>" onclick="return confirm ('Deseja excluir?')" role="button">Excluir</a>
      </td> 
      </td>
    </tr>
  
    <?php
      }
    }
  ?>

  </tbody>
</table>
