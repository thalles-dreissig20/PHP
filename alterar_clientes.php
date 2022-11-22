<?php


$id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE id = $id";
$altera_clientes = $db->get_row($sql);

//print_r($result);
?>

<div class="p-3">

<form action="update_clientes.php" method="POST">

<input type="hidden" value="<?php echo $altera_clientes->id ?>" name="inputId">

  <div class="col-md-4 position-relative">
    <label for="validationTooltip01" class="form-label">Nome </label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $altera_clientes->nome; ?>" name="nome"  required>
  </div>
  
  
  <div class="col-md-4 position-relative">
    <label for="validationTooltip02" class="form-label">Telefone</label>
    <input type="text" class="form-control" id="validationTooltip02" value="<?php echo $altera_clientes->telefone; ?>" name="telefone" required>
     </div>
   </div>

   <div class="col-md-4 position-relative">
    <label for="validationTooltip02" class="form-label">Endereço</label>
    <input type="text" class="form-control" id="validationTooltip02" value="<?php echo $altera_clientes->endereco; ?>" name="endereco" required>
     </div>
   </div>


  <div class="col-12">
    <button class="btn btn-primary" type="submit">Cadastrar</button>
  </div>
</form>
</div