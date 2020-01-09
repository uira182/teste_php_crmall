<?php

class Cliente extends Conexao {

    public function __construct() {
        parent:: __construct();
    }

    public function __destruct() {
        parent:: __destruct();
    }

}

class ListaCliente extends Cliente {

    public function __construct() {
        parent:: __construct();
    }

    public function __destruct() {
        parent:: __destruct();
    }

    protected function listaCliente($id) {
        $sql = "SELECT * FROM cliente WHERE id='$id'";
        $resultado = $this->getOne($sql);
        return $resultado;
    }

    protected function listarClientes() {
        $sql = "SELECT * FROM cliente";
        $resultado = $this->getAll($sql);
        return $resultado;
    }

}

class ExibeCliente extends listaCliente {

    public function __construct() {
        parent:: __construct();
    }

    public function __destruct() {
        parent:: __destruct();
    }

    public function exibeCliente($id) {
        $f='';
        $m='';
        $cliente = parent:: listaCliente($id);
        if($cliente['sexo'] == 0){
            $m = "checked";
        }else{
            $f = "checked";
        }
        echo'
            <form id="form_edt" class="pb-5" method="post">
                <label for="nome">Nome</label>  
                <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome" value="'.$cliente['nome'].'" required />

                <label for="data">Data Nascimento</label>
                <input class="form-control" type="date" name="data" id="data" value="'.$cliente['data_nascimento'].'" required />
                
                <section class="form-row p-2">
                    <section class="col-6 text-center">
                    <input class="form-control" type="radio" name="sexo" id="sexoM" value="0" '. $m .' />
                    <label for="sexoM">Masculino</label>
                    </section>
                    <section class="col-6 text-center">
                    <input class="form-control" type="radio" name="sexo" id="sexoF" value="1" '. $f .'/>
                    <label for="sexoF">Feminino</label>
                    </section>
                </section>

                <label for="cep">CEP</label>
                <section class="form-row">
                    <section class="col-10 col-md-11">
                    <input class="form-control" type="number" name="cep" id="cep" placeholder="CEP" value="'.$cliente['cep'].'" required />
                    </section>
                    <section class="col-2 col-md-1">
                        <button id="busca_cep" class="form-control btn btn-success" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </section>
                </section>

                <label for="endereco">Endereço</label>
                <input class="form-control" type="text" name="endereco" id="endereco" value="'.$cliente['endereco'].'" placeholder="Endereço" disabled required />

                <label for="numero">Numero</label>
                <input class="form-control" type="number" name="numero" id="numero" placeholder="nº" value="'.$cliente['numero'].'" disabled required />

                <label for="complemento">Complemento</label>
                <input class="form-control" type="text" name="complemento" id="complemento" placeholder="Casa, andar, frente, fundos..." value="'.$cliente['complemento'].'" disabled required />
                
                <label for="bairro">Bairro</label>
                <input class="form-control" type="text" name="bairro" id="bairro" placeholder="Centro, vila..." value="'.$cliente['bairro'].'" disabled required />
                
                <label for="estado">Estado</label>
                <input class="form-control" type="text" name="estado" id="estado" placeholder="Estado" value="'.$cliente['estado'].'" disabled required />
                
                <label for="bairro">Cidade</label>
                <input class="form-control" type="text" name="cidade" id="cidade" placeholder="Cidade" value="'.$cliente['cidade'].'" disabled required/>

                <section class="form-row">
                    <section class="col-md-6">
                    <button class="form-control btn btn-success mt-2" id="atualizar" name="atualizar" type="submit">
                        Atualizar
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

        ';
    }

    public function exibirClientes() {
        $clientes = parent:: listarClientes();
        foreach ($clientes as $cliente) {
            if($cliente['sexo'] == 0){
                $sexo = "Masculino";
            }else{
                $sexo = "Feminino";
            }
            echo'
            <tr>
                <td>'.$cliente["nome"].'</td>
                <td>'.date("d/m/Y", strtotime($cliente["data_nascimento"])).'</td>
                <td>'.$sexo.'</td>
                <td>'. number_format(substr($cliente['cep'], 0, 5),0,"","").'-'.substr($cliente['cep'], 5, 3) .'</td>
                <td>'.$cliente['endereco'].'</td>
                <td>'.$cliente['complemento'].'</td>
                <td>'.$cliente['bairro'].'</td>
                <td>'.$cliente['estado'].'</td>
                <td>'.$cliente['cidade'].'</td>
                <td>
                    <a class="text-dark" href="?pg=edt&id='.$cliente['id'].'">
                        <i class="fas fa-pen-alt"></i>
                    </a>
                </td>
                <td>
                    <a class="text-danger del_cliente" href="?del='.$cliente['id'].'">
                        <i class="fa fa-trash-alt"></i>
                    </a>
                </td>
            </tr>

            ';
        }
    }

}

class insertCliente extends Conexao
{
    private $nome;
    private $data;
    private $sexo;
    private $cep;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $estado;
    private $cidade;

    public function __construct($nome, $data, $sexo, $cep, $endereco, $numero, $complemento, $bairro, $estado, $cidade) {
        parent:: __construct();

        $this->nome = $nome;
        $this->data = $data;
        $this->sexo = $sexo;
        $this->cep = $cep;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->estado = $estado;
        $this->cidade = $cidade;

        $resultado = $this->addCliente();

        return $resultado;
    }

    public function __destruct() {
        parent:: __destruct();
    }

    private function addCliente(){
        $sql = "INSERT INTO cliente (nome, data_nascimento, sexo, cep, endereco, numero, complemento, bairro, estado, cidade) VALUES ('{$this->nome}', '{$this->data}', '{$this->sexo}', '{$this->cep}', '{$this->endereco}', '{$this->numero}', '{$this->complemento}', '{$this->bairro}', '{$this->estado}', '{$this->cidade}')";

        if(!$this->verificaCliente($this->nome, $this->data)){

            $resultado = parent:: execute($sql);

            if(!$resultado){
                echo"Erro! Não foi possivel cadastrar o cliente.";
            }else{
                header("Location: index.php");
            }

        }else{
            header("Location: index.php?pg=add&erro=1");
        }
    }

    private function verificaCliente($nome, $data){
        $sql="SELECT nome, data_nascimento FROM cliente WHERE nome='$nome' AND data_nascimento='$data'";
        $resultado = parent:: getAll($sql);

        $cont = Count($resultado);

        if ($cont > 0){ 
            return true;
        } else { 
            return false;
        }
    }
    
}

class updateCliente extends Conexao
{
    private $nome;
    private $data;
    private $sexo;
    private $cep;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $estado;
    private $cidade;

    public function __construct($id, $nome, $data, $sexo, $cep, $endereco, $numero, $complemento, $bairro, $estado, $cidade) {
        parent:: __construct();
        $this->id = $id;
        $this->nome = $nome;
        $this->data = $data;
        $this->sexo = $sexo;
        $this->cep = $cep;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->estado = $estado;
        $this->cidade = $cidade;

        $this->edtCliente();
    }

    public function __destruct() {
        parent:: __destruct();
    }

    private function edtCliente(){
        $sql = "UPDATE cliente SET nome='{$this->nome}', data_nascimento='{$this->data}', sexo='{$this->sexo}', cep='{$this->cep}', endereco='{$this->endereco}', numero='{$this->numero}', complemento='{$this->complemento}', bairro='{$this->bairro}', estado='{$this->estado}', cidade='{$this->cidade}' WHERE id='$this->id'";

        $resultado = parent:: execute($sql);

        if(!$resultado){
            header("Location: index.php");
        }

    }
    
}

class deleteCliente extends Conexao
{
    private $id;

    public function __construct($id) {
        parent:: __construct();
        $this->id = $id;

        $this->delCliente();
    }

    public function __destruct() {
        parent:: __destruct();
    }

    private function delCliente(){
        $sql = "DELETE FROM cliente WHERE id='{$this->id}'";
        $resultado = parent:: execute($sql);

        if(!$resultado){
            header("Location: index.php?msg=1");
        }
    }

}


?>