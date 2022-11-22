<?php


$sql = "SELECT * FROM clientes";
$clientes = $db->get_results($sql);

$sql = "SELECT * FROM tamanhos";
$tamanho = $db->get_results($sql);

$sql = "SELECT * FROM sabor WHERE status = 'A'";
$sabores = $db->get_results($sql);

$sql = "SELECT * FROM forma_pgto";
$forma_pgto = $db->get_results($sql);

$sql = "SELECT * FROM status_pedido";
$status = $db->get_results($sql);

?>
<!-- COMEÇA AQUI O HTML-->
<form action="gravar_pedido.php" method="POST" class="row g-3, p-3">

   <div class="col-12">
      <label for="inputEmail4" class="form-label">Cliente </label>
      <select name="inputCliente" class="form-control">
        <option selected>Selecione o cliente...</option>
          <?php
          if (!empty($clientes)){
              foreach($clientes as $reg){
                  echo '<option value="'.$reg->id.'">'.$reg->id.' - '.$reg->nome.' - '.$reg->telefone.'</option>';
              }
            }
          ?>
      </select>
   </div>
  
  <!-- Tamanho -->
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Tamanho</label>
    <select name="inputTamanho" class="form-control">
    <option selected>Selecione o tamanho...</option>
        <?php
            if (!empty($tamanho)){
                foreach($tamanho as $reg){
                    echo "<option value='$reg->id'>$reg->id "." - "."$reg->tamanho</option>";
                }
              }
        ?>
    </select>
  </div>

    <!-- Botão para acionar modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_sabores">
    Escolher sabores...
  </button>

  <!-- Modal -->
  <div class="modal fade" id="modal_sabores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Escolha os sabores</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php
          if (!empty($sabores)){
            foreach($sabores as $reg){
          ?>
          
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="inputSabor[]" value='<?php echo $reg->id; ?>'>
            <label class="form-check-label"><strong><?php echo $reg->nome_sabor;?></strong> <?php echo $reg->ingredientes;?></label>
          </div>
          
          <?php
          }
          }
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

<!-- Forma de pagamento -->
  <div class="col-6 , p-4">
    <label for="inputState" class="form-label">Forma de pagamento</label>
    <select name="inputPagamento" class="form-select">
      <option selected>Escolha uma forma de pagamento...</option>
      <?php
          if (!empty($forma_pgto)){
          foreach($forma_pgto as $reg){
            echo "<option value='$reg->id'>$reg->id "." - "."$reg->forma_pgto</option>";
          }
        }
      ?>
    </select>
  </div>
  
<!--Status-->
  <div class="col-6 , p-4">
    <label for="inputState" class="form-label">Status</label>
    <select name="inputStatus" class="form-select">
        <?php
          if (!empty($status)){
          foreach($status as $reg){
            echo '<option value="'.$reg->id.'">'.$reg->id.' - '.$reg->status.'</option>';
            }
          }
        ?>
    </select>
  </div>
  
<!--Observação-->
  <div class="col-12 ,p-5">
    <label for="validationTextarea" class="form-label">Observação </label>
    <textarea class="form-control " name="observacao" ></textarea>
  </div>

<!--Botão de cadastrar-->
  <div class="col-11 ">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </div>
</form>