<?php

include_once('inc/mysqli.class.php');

$id = $_GET['id'];

$sql = "DELETE FROM pedidos WHERE id = $id";
$result = $db->get_row($sql);

header("location: index.php?page=consulta_pedido");

//print_r($result);
?>