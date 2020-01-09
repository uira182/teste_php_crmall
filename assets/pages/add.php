
<?php 
$erro = "";
//var_dump($_POST); 

if(isset($_POST['cadastrar'])){
  $add = new insertCliente($_POST['nome'], $_POST['data'], $_POST['sexo'], $_POST['cep'], $_POST['endereco'], $_POST['numero'], $_POST['complemento'], $_POST['bairro'], $_POST['estado'], $_POST['cidade']);
  var_dump($add);
}

if(isset($_GET['erro'])){
  switch($_GET['erro']){
    case 1:
      echo'
        <div class="mt-2 alert alert-danger fade in alert-dismissible show">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-size:20px">×</span>
          </button>
          <strong>Erro!</strong> Cliente já cadastrado no sistema.
        </div>
      ';
    break;
  }
}

?>

<form class="pb-5" method="post">
  <label for="nome">Nome</label>  
  <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome" required />

  <label for="data">Data Nascimento</label>
  <input class="form-control" type="date" name="data" id="data" required />
  
  <section class="form-row p-2">
    <section class="col-6 text-center">
      <input class="form-control" type="radio" name="sexo" id="sexoM" value="0" checked />
      <label for="sexoM">Masculino</label>
    </section>
    <section class="col-6 text-center">
      <input class="form-control" type="radio" name="sexo" id="sexoF" value="1" />
      <label for="sexoF">Feminino</label>
    </section>
  </section>

  <label for="cep">CEP</label>

  <section class="form-row">
    <section class="col-10 col-md-11">
      <input class="form-control" type="number" name="cep" id="cep" placeholder="CEP" required />
    </section>
    <section class="col-2 col-md-1">
      <button id="busca_cep" class="form-control btn btn-success" type="button">
        <i class="fa fa-search"></i>
      </button>
    </section>
  </section>

  <label for="endereco">Endereço</label>
  <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Endereço" disabled required />

  <label for="numero">Numero</label>
  <input class="form-control" type="number" name="numero" id="numero" placeholder="nº" disabled required />

  <label for="complemento">Complemento</label>
  <input class="form-control" type="text" name="complemento" id="complemento" placeholder="Casa, andar, frente, fundos..." disabled required />
  
  <label for="bairro">Bairro</label>
  <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Centro, vila..." disabled required />
  
  <label for="estado">Estado</label>
  <input class="form-control" type="text" name="estado" id="estado" placeholder="" disabled required />
  
  <label for="bairro">Cidade</label>
  <input class="form-control" type="text" name="cidade" id="cidade" placeholder="" disabled required/>

  <section class="form-row">
    <section class="col-md-6">
      <button class="form-control btn btn-success mt-2" name="cadastrar" type="submit">
        Cadastrar
      </button>
    </section>
    <section class="col-md-6">
      <a href="index.php">
        <button type="button" class="form-control btn btn-dark mt-2">
          Voltar
        </button>
      </a>
    </section>
  </section>
</form>
 
<script src="assets/js/cep.js"></script>