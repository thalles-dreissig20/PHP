<?php


$id = $_GET['id'];

$sql = "SELECT * FROM sabor WHERE id = $id";
$altera_sabor = $db->get_row($sql);

//print_r($result);
?>

<div class="p-3">

<form action="update_sabor.php" method="POST">

<input type="hidden" value="<?php echo $altera_sabor->id ?>" name="inputId">

  <div class="col-md-4 position-relative">
    <label for="validationTooltip01" class="form-label">Nome do Sabor </label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $altera_sabor->nome_sabor; ?>" name="nome_sabor"  required>
  </div>
  
  
  <div class="col-md-4 position-relative">
    <label for="validationTooltip02" class="form-label">Ingredientes</label>
    <input type="text" class="form-control" id="validationTooltip02" value="<?php echo $altera_sabor->ingredientes; ?>" name="ingredientes" required>
     </div>
  
  
     <div class="col-md-4 position-relative">
        <label for="validationTooltip04" class="form-label" name="status">Status</label>
        <select class="form-select" id="validationTooltip04" name="status" required>
          <option value="A" <?php if($altera_sabor->status == "A") {echo "selected";} ?>>Ativo</option>
          <option value="I" <?php if($altera_sabor->status == "I") {echo "selected";} ?>>Inativo</option>
        </select>
      </div>
  </div>


  <div class="col-12">
    <button class="btn btn-primary" type="submit">Cadastrar</button>
  </div>
</form>
</div