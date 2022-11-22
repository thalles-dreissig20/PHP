<?php


$id = $_GET['id'];

$sql = "SELECT * FROM tamanhos WHERE id = $id";
$result = $db->get_row($sql);

//print_r($result);
?>

<div class="p-4">

<form action="update_tamanho.php" method="POST">

<input type="hidden" value="<?php echo $result->id ?>" name="inputId">

  <div class="col-5">
    <label for="validationTooltip01" class="form-label">Tamanho </label>
    <input type="text" class="form-control" id="validationTooltip01" value="<?php echo $result->tamanho; ?>" name="tamanho"  required>
  </div>
  
  <div class="col-5">
    <label for="validationTooltip02" class="form-label">Valor</label>
    <input type="text" class="form-control" id="validationTooltip02" value="<?php echo $result->valor; ?>" name="valor" required>
  </div>
  
     <div class="col-4 , p-3">
        <label for="validationTooltip04" class="form-label" name="status">Status</label>
        <select class="form-select" id="validationTooltip04" name="status" required>
          <option value="A" <?php if($result->status == "A") {echo "selected";} ?>>Ativo</option>
          <option value="I" <?php if($result->status == "I") {echo "selected";} ?>>Inativo</option>
        </select>
     </div>  
 
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Cadastrar</button>
  </div>

</form>
</div>   