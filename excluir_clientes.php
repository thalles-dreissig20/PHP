<?php

include_once('inc/mysqli.class.php');

$id = $_GET['id'];

$sql = "DELETE FROM clientes WHERE id = $id";
$result = $db->get_row($sql);

header("location: index.php?page=consulta_clientes");

//print_r($result);
?>