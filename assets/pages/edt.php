<?php 

//var_dump($_POST); 

if(isset($_POST['atualizar'])){
  $edt = new updateCliente($_GET['id'], $_POST['nome'], $_POST['data'], $_POST['sexo'], $_POST['cep'], $_POST['endereco'], $_POST['numero'], $_POST['complemento'], $_POST['bairro'], $_POST['estado'], $_POST['cidade']);
}

$clientes->exibecliente($_GET['id']);

?>

 
<script src="assets/js/cep.js"></script>