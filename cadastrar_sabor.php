
<div class="p-3">

<form action="gravar_sabor.php" method="POST">

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Ingredientes</label>
  <textarea class="form-control" name="ingredientes" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
  
  
  <div class="col-md-4 position-relative">
    <label for="validationTooltip02" class="form-label">Nome do Sabor</label>
    <input type="text" class="form-control" id="validationTooltip02" name="sabor" required>
     </div>
  
  
     <div class="col-md-4 position-relative">
        <label for="validationTooltip04" class="form-label" name="status">Status</label>
        <select class="form-select" id="validationTooltip04" name="status" required>
          <option value='A'>Ativo</option>
          <option value='I'>Inativo</option>
        </select>
      </div>
  </div>
 
  
 
  <div class="col-12">
    <button class="btn btn-primary"  type="submit">Cadastrar</button>
  </div>
</form>
</div>