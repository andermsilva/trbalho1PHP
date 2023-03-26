<?php
include('utils.php');
$alert = null;
$msg = "";
$tr = 0;
$cor="";
$place_a ="";

if (isset($_GET['calc'])) {
    $v =  $_GET['valor'];
    $p =  $_GET['preco'];

    $_v = format_numero_float($v);    
    $_p = format_numero_float($p);    
   
    if (
        !empty($_p)
        && !empty($_v)
        && is_numeric($_v)
        && is_numeric($_p)
    ) {
       
        if ($_v > $_p) {
            $alert = true;
            $tr = $_v - $_p;
        
            $msg = "<div class='alert alert-primary' role='alert'>
                      <p> Pagamento realizado com sucesso.<br />";
            $msg .= "Valor do troco R$ ".number_format($tr,2,',','.')."</p> </div>";
        } elseif ($_v < $_p) {
            $alert = true;
            $tr = $_v - $_p;
            
            $msg = "<div class='alert alert-warning' role='alert'>";
            $msg .= "<p>Não foi possivel realizar o pagamento.<br />";
            $msg .= "Valor devido R$ ".number_format($tr,2,',','.')."</p> </div>";
        } else{
            $alert = true;
            $msg = "<div class='alert alert-success' role='alert'>";
            $msg .= "<p>Pagamento realizado com sucesso...<br /></p> </div>";
        }

        

    }else{
        $alert = false;
        $msg = "<div class='alert alert-danger' role='alert'>";
        $msg .= "<p>Preencha todos os campos...<br />";
        $msg .= "Ex.: 12,50</p></div>";
        $cor = "alert-danger";
       
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles_tb.css" />
    <title> PHP</title>
</head>

<body>
    <header>

    </header>
    <h2 class="centralizar text-primary">Exercício 1</h2>
    <main>
        <div class="menu_v">
            
            <?php 
                echo menu();
                ?>
        </div>
        
        <section class="section_form">
            <h4 class="centralizar text-secondary">Troco certo</h4>
            <form>
                <div class="mb-3">
                    <div class="form-text"></div>
                    <label for="valor" class="form-label"> Valor entregue R$</label>
                    <input type="text" class="form-control text-end alert-danger" name="valor" id="valor" 
                
                    >

                </div>
                <div class="mb-3">
                    <label for="preco" class="form-label">Preço do produto</label>
                    <input type="text" class="form-control" name="preco" id="preco">
                </div>

                <button type="submit" class="btn btn-primary" name="calc">Calcular</button> &nbsp;
                <a href="exerc1.php">

                    <button type="button" class="btn btn-secondary">Reset</button>
                </a>
            </form>
            <br />
            <div class="_alert">

                <?php

                if (!is_null($alert)) {
                    if($alert){
                        echo $msg;
                    }else{
                      echo  $msg;
                    }

                }
                ?>
            </div>

        </section>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>