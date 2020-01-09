<?php

    require_once("./assets/class/Conexao.class.php");
    require_once("./assets/class/Cliente.class.php");

    $clientes = new ExibeCliente();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste cadastro de clientes</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
    <script src="./assets/js/jquery/jquery.min.js"></script>
</head>

<body>
    <header class="container-fluid bg-dark text-light pb-2">
        <h1 class="text-center">Clientes</h1>
        <nav class="container">
            <section class="badge badge-success align-top p-2">
                <a class="text-light" href="index.php">
                    <i class=""></i> HOME
                </a>
            </section>
            <section class="badge badge-success align-top p-2">
                <a class="text-light" href="?pg=add">
                    <i class="fa fa-plus"></i> ADD
                </a>
            </section>
        </nav>
    </header>
    <section class="container">
        <?php
            if(isset($_GET['pg'])){ 
                switch($_GET['pg']){
                    case 'edt':
                        include_once("./assets/pages/edt.php");
                    break;
                    case 'add':
                        include_once("./assets/pages/add.php");
                    break;
                    default :
                        include_once("./assets/pages/home.php");
                    break;
                }
            }else{
                include_once("./assets/pages/home.php");
            }

            if(isset($_GET['msg'])){
                switch($_GET['msg']){
                    case 1:
                        echo'
                            <div class="alert alert-success fade in alert-dismissible show" style="margin-top:18px;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                </button>
                                <strong>Sucesso!</strong> Cliente deletado.
                            </div>
                        ';
                    break;
                }
            }
        ?>
    </section>

    <script src="./assets/fontawesome/js/all.min.js "></script>
    <script src="./assets/bootstrap/js/bootstrap.min.js "></script>
    <script src="./assets/js/popper/popper.min.js "></script>
</body>

</html>