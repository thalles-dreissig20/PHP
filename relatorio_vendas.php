<?php
  if (isset($_POST['inputDataFiltro'])){
    $data_filtro = $_POST['inputDataFiltro'];
  }else{
    $data_filtro = date("Y-m-d");
  }


  if (isset($_POST['inputDataFiltro'])){
    $data_filtro = $_POST['inputDataFiltro'];
  }else{
    $data_filtro = date("Y-m-d");
  } 
  
  if (isset($_POST['tipo_de_relatorio'])){
      

  }
    $sql = "SELECT p.id, p.dt_pedido, p.id_cliente c.tamanho, t.valor
                FROM pedidos p 
                INNER JOIN clientes c ON c.id = p.id_cliente
                INNER JOIN tamanhos t ON t.id = p.id_tamanho
                ORDER BY p.dt_pedido";
    $analitico = $db->get_results($sql);


    $vl_total = 0;

    $sql = " SELECT p.id, p.dt_pedido, c.nome, t.tamanho, t.valor 
                FROM pedidos p 
                INNER JOIN clientes c ON c.id = p.id_cliente
                INNER JOIN tamanhos t ON t.id = p.id_tamanho
                ORDER BY p.dt_pedido";
    $sintetico = $db->get_results($sql);

    //print_r($sabor);
?>


<style>
.inputdata1{
    position: relative;
    top: 70px;
    left: 20px;
    width: 200px;
    height: 30px;
}
.inputdata2{
    position: relative;
    top:40px;
    left:230px;
    width: 200px;
    height: 30px;
}
.radio1{
    position: relative;
    left:480px;
    top:5px;
    width: 200px; 
}
.radio2{
    position: relative;
    left:480px;
    top:5px;
    width: 200px;   
}
</style>

    <div class="data">
        <div>
            <input class="inputdata1" name="data_filtro1" type="date" value="<?php echo $data_filtro?>" id="example-datetime-local-input">
        </div>
        <div>
            <input class="inputdata2" name="data_filtro2" type="date" value="<?php echo $data_filtro?>" id="example-datetime-local-input">
        </div>
    </div>

    <div class="radio1">
        <input  type="radio" name="tipo_relatorio" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">Sintético</label>
    </div>
    <div class="radio2">    
        <input  type="radio" name="tipo_relatorio" id="flexCheckChecked" >
        <label class="form-check-label" for="flexCheckChecked">Analítico</label>
    </div>





<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Data_Pedido</th>
            <th scope="col">Cliente</th>
            <th scope="col">Tamanho</th>
            <th scope="col">Valor</th>
        </tr>
    </thead>
    <tbody>   
    
    <?php
    if (!empty($relatorio)){
        foreach($relatorio as $reg){
    ?>

        <tr>
            <th scope="row"><?php echo $reg->id; ?></th>
            <td><?php echo formata_data($reg->dt_pedido); ?></td>
            <td><?php echo $reg->nome; ?></td>
            <td><?php echo $reg->tamanho; ?></td>
            <td><?php echo Formata_Valor($reg->valor);?></td>
        </tr>     
        <?php
        
        }
        $vl_total = $vl_total + $reg->valor;
        }
    ?>
    
    
 
 <style>
 .botao_filtrar{
     background-color: LightBlue;
     color:black;
     position: relative;
     left:20px;
     width: 410px;
     cursor:pointer;
 }
 </style>    
    <button class="botao_filtrar">Filtrar</button>

    </tbody>
    <tr>
        <td><?php echo $reg->valor?></td>
    </tr>
</table>
   