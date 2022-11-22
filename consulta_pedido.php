<?php
if (isset($_POST['inputDataFiltro'])){
  $data_filtro = $_POST['inputDataFiltro'];
}else{
  $data_filtro = date("Y-m-d");
}

if (isset($_POST['inputStatus'])){
  $status = $_POST['inputStatus'];
}else{
  $status = 1;
}

$sql = "SELECT p.id as id, c.nome, t.tamanho, s.status
        FROM pedidos p 
        INNER JOIN clientes c ON c.id = p.id_cliente 
        INNER JOIN tamanhos t ON t.id = p.id_tamanho 
        INNER JOIN status_pedido s ON s.id = p.id_status
        WHERE p.id_status = $status
        AND p.dt_pedido BETWEEN '$data_filtro 00:00:00' AND '$data_filtro 23:59:59'
        ORDER BY p.dt_pedido";
//echo $sql;
$pedidos = $db->get_results($sql);

$sql = "SELECT * FROM status_pedido";
$status = $db->get_results($sql);

$sql = "SELECT * FROM sabor WHERE status = 'A'";
$sabores = $db->get_results($sql);
?>
<!-- COMEÇA AQUI O HTML DA PAGINA -->
<form action="?page=consulta_pedido" method="POST">

<!--Estilo Dos Inputs-->
<style>
    .pequeno{
      position: relative;
      width: 50%;
      left: 65px;
    }
    .inputstatus{
      width: 200px;
      height: 30px;
      position: relative;
    }
    .inputdata{
      position: relative;
      top: 94px;
      left:210px;
      width: 200px;
      height: 30px;
                                        }
  </style>
  <div class="col-3 , p-4">
    <div class="form-group">
      <input class="inputdata" name="inputDataFiltro" type="date" value="<?php echo $data_filtro?>" id="example-datetime-local-input">
    </div>
  </div>
  
  <div class="col-3 , p-4">
      <select name="inputStatus" class="inputstatus">
        <option selected>em preparação...</option>
        <?php
          if (!empty($status)){
          foreach($status as $reg){
            echo "<option value='$reg->id'>$reg->id "." - "."$reg->status</option>";
          }
          }
        ?>
    </select>
  </div>
  
  <div class="col-5">
      <button type="submit" class="btn btn-info pequeno">Filtrar</button>
  </div>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">clientes</th>
      <th scope="col">tamanho</th>
      <th scope="col">status</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>   
  
  <?php
  if (!empty($pedidos)){
      foreach($pedidos as $reg){
  ?>

    <tr>
      <th scope="row"><?php echo $reg->id; ?></th>
      <td><?php echo $reg->nome; ?></td>
      <td><?php echo $reg->tamanho; ?></td>
      <td><?php echo $reg->status; ?></td>
      <td>
     
        <!-- Botão para acionar modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_sabores<?php echo $reg->id;?>">Sabores</button>
        <a class="btn btn-primary" href="index.php?page=alterar_pedido&id=<?php echo $reg->id; ?>" role="button">Editar</a> 
        <a class="btn btn-danger" href="index.php?page=cancela_pedido&id=<?php echo $reg->id; ?>" onclick="return confirm ('Deseja cancelar?')" role="button">cancelar</a>
      

        <!-- Modal -->
        <div class="modal fade" id="modal_sabores<?php echo $reg->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sabores de <?php echo $reg->nome?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!--Consultando o sabor no modal-->
                <?php
                $sql = "SELECT sabor.nome_sabor , sabor.ingredientes
                        FROM pedido_sabor
                        INNER JOIN sabor ON sabor.id = pedido_sabor.id_sabor
                        WHERE pedido_sabor.id_pedidos = $reg->id";

                $sabores = $db->get_results($sql);        

                if(!empty($sabores)){
                  foreach($sabores as $sabor){
                    echo '<p><strong>'.$sabor->nome_sabor.'</strong> - '.$sabor->ingredientes.'</p>';
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
      </td>
    </tr>
  
    <?php
      }
    }
  ?>

  </tbody>
</table>
