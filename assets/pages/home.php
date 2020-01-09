<?php 
if(isset($_GET['del']) && !empty($_GET['del'])){
   $del = new deleteCliente($_GET['del']);
}

?>
<article class="row ">
            <article class="col-12 ">
                <section class="list-group ">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data N.</th>
                                <th>Sexo</th>
                                <th>CEP</th>
                                <th>Endereço</th>
                                <th>Comp</th>
                                <th>Bairro</th>
                                <th>Estado</th>
                                <th>Cidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $clientes->exibirClientes(); ?>
                        </tbody>
                    </table>
                </section>
            </article>
        </article>

        <script src="assets/js/cep.js"></script>