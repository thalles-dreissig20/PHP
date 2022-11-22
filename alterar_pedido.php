<?php

$id_pedido = $_GET['id'];
$sql = "SELECT * FROM pedidos p WHERE p.id = $id_pedido";
$pedido = $db->get_row($sql);

$sql = "SELECT ps.id_sabor FROM pedido_sabor ps WHERE ps.id_pedidos = $pedido->id";
@$pedido_sabor = $db->get_col($sql);

///////////////////////////////

$sql = "SELECT * FROM clientes";
$cliente = $db->get_results($sql);

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
<form action="update_pedido.php" method="POST" class="row g-3, p-3">
   
   <style>
   .titulo{
     position: relative;
     background-color: #CD96CD;
     width: 90%;
     height: 50px;
     left: 60px;
     text-align: center;
     border-radius:5px;
   }
   h2{
    font-size: 40px;
   }
   </style>
   <div class="titulo"> <h2>atualizar pedidos</h2></div>
    
   <input type="hidden" value="<?php echo $pedido->id;?>" name="inputId">
   <div class="col-12">
      <label for="inputEmail4" class="form-label">Cliente </label>
      <select name="inputCliente" class="form-control">
        <?php
        if (!empty($cliente)){
            foreach($cliente as $reg){
                $selected = ($reg->id == $pedido->id_cliente) ? "selected" : "";
                echo '<option '.$selected.' value="'.$reg->id.'">'.$reg->id.' - '.$reg->nome.' - '.$reg->telefone.'</option>';
            }
          }
        ?>
      </select>
   </div>

  <!-- Tamanho -->
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Tamanho</label>
    <select name="inputTamanho" class="form-control">
      <?php
          if (!empty($tamanho)){
              foreach($tamanho as $reg){
                  $selected = ($reg->id == $pedido->id_tamanho) ? "selected" : "";
                  echo '<option '.$selected.' value="'.$reg->id.'">'.$reg->id. '-' .$reg->tamanho.'</option>';
              }
            }
      ?>
    </select>
  </div>

    <!-- Botão para acionar modal -->
    <style>
    .botao_modal{
      position: relative;
      top:28px;
      width: 200px;
      height: 50px;
      background-color: #CD96CD;
    }
    </style>
  <button type="button" class="botao_modal" data-toggle="modal" data-target="#modal_sabores">
    Escolher sabores...
  </button>

  <!-- Modal -->
  <div class="modal fade" id="modal_sabores" name="inputSabor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              $checked = (in_array($reg->id,  $pedido_sabor)) ? "checked" : "";
          ?>
          
            <div class="form-group form-check">
              <input type="checkbox" <?php echo $checked;?> class="form-check-input" name="inputSabor[]" value='<?php echo $reg->id; ?>'>
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
      <?php
          if (!empty($forma_pgto)){
              foreach($forma_pgto as $reg){
                  $selected = ($reg->id == $pedido->forma_pgto) ? "selected" : "";
                  echo "<option '.$selected.' value='$reg->id'>$reg->id "." - "."$reg->forma_pgto</option>";
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
            $selected = ($reg->id == $pedido->id_status) ? "selected" : "";
            echo '<option '.$selected.' value="'.$reg->id.'">'.$reg->id.' - '.$reg->status.'</option>';
            }
          }
        ?>
    </select>
  </div>
  
<!--Observação-->
  <div class="col-12 ,p-5">
    <label for="validationTextarea" class="form-label">Observação </label>
    <textarea class="form-control " name="observacao" ><?php echo $pedido->observacao;?></textarea>
  </div>

<!--Botão de cadastrar-->
  <style>
  .atualizar_pedido{
    position: relative;
    background-color:#CD96CD;
    padding: 10px;
    top: 20px;
  }
  </style>
  <div class="col-11 ">
    <button type="submit" class="atualizar_pedido">atualizar pedidos</button>
  </div>
</form>