<?php
$sql = "select * from tamanhos";
$tamanhos = $db->get_results($sql);

//print_r($tamanhos);
?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tamanho</th>
      <th scope="col">Valor</th>
      <th scope="col">Status</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (!empty($tamanhos)) {
      foreach ($tamanhos as $reg) {
    ?>

        <tr>
          <th scope="row"><?php echo $reg->id; ?></th>
          <td><?php echo $reg->tamanho; ?></td>
          <td><?php echo Formata_Valor($reg->valor); ?></td>
          <td><?php echo Formata_Status($reg->status); ?></td>
          <td>
            <a class="btn btn-primary" href="index.php?page=alterar_tamanho&id=<?php echo $reg->id; ?>" role="button">Editar</a>
            <a class="btn btn-danger" href="index.php?page=excluir_tamanho&id=<?php echo $reg->id; ?>" onclick="return confirm ('Deseja excluir?')" role="button">Excluir</a>
          </td>
        </tr>

    <?php
      }
    }
    ?>


  </tbody>
</table>