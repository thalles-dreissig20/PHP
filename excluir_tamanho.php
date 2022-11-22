<?php

include_once('inc/mysqli.class.php');

$id = $_GET['id'];

$sql = "DELETE FROM tamanhos WHERE id = $id";
$result = $db->get_row($sql);

header("location: index.php?page=consulta_tamanho");

//print_r($result);
?>

