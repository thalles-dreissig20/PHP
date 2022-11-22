
<form action="gravar_tamanho.php" method="POST">

  <div class="col-5">
    <label for="validationTooltip01" class="form-label">Tamanho </label>
    <input type="text" class="form-control" id="validationTooltip01" name="tamanho"  required>
  </div>
  
  <div class="col-5">
    <label for="validationTooltip02" class="form-label">Valor</label>
    <input type="text" class="form-control" id="validationTooltip02" name="valor" required>
  </div>

  <div class="col-5 , p-3">
    <label for="validationTooltip04" class="form-label" name="status">Status</label>
    <select class="form-select" id="validationTooltip04" name="status" required>
     <option value="A">Ativo</option>
     <option value="I">Inativo</option>
    </select>
  </div>
  
  <div class="col-6">
    <button class="btn btn-primary" type="submit">Cadastrar</button>
  </div>

</form>
