<?php
include('utils.php');
$alert = null;
$msg = "";
$tr = 0;
$cor="";
$place_a ="";

if (isset($_GET['enviar'])) {
    $v =  $_GET['valido'];
    $b =  $_GET['branco'];
    $n =  $_GET['nulo'];
 
    if (
        !empty($b) && is_numeric($b) || $b == 0
        && !empty($v) && is_numeric($v) || $v == 0 
        && !empty($n) && is_numeric($n) || $n == 0
    ) {
        $alert = true;

       // echo "$v $b $n";
        $total = $b + $v + $n;
        
        $perc_validos = ($v/$total)*100;
        $perc_nulos = ($n/$total) * 100;
        $perc_bracos = ($b/$total) * 100;
           
        $msg = "<div class='alert alert-info' role='alert'>";
        $msg .= "<p>Total de votos: "  .number_format($total,0,',','.')." </div>";
        
        $msg .= "<div class='alert alert-success' role='alert'>";
        $msg .= "<p>Total de votos válidos: ".number_format($v,0,',','.')."<br />";
        $msg .= "Porcentagem de votos válidos: ".number_format($perc_validos,2,',','.')." %</p></div>";
        
        $msg .= "<div class='alert alert-warning' role='alert'>";
        $msg .= "<p>Total de votos em brancos: ".number_format($b,0,',','.')."<br />";
        $msg .= "Porcentagem de votos em branco: ".number_format($perc_bracos,2,',','.')." %</p></div>";
        
        $msg .= "<div class='alert alert-danger' role='alert'>";
        $msg .= "<p>Total de votos nulos: ".number_format($n,0,',','.')."<br />";
        $msg .= "Porcentagem de votos nulos: ".number_format($perc_nulos,2,',','.')." %</p></div>";

    }else{
        $alert = false;
        $msg = "<div class='alert alert-danger' role='alert'>";
        $msg .= "<p>Preencha todos os campos com numeros inteiros...<br />";
        $msg .= "Ex.: 2540</p></div>";
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
    <h2 class="centralizar text-primary">Exercício 7</h2>
    <main>
        <div class="menu_v">
            
            <?php 
                echo menu();
                ?>
        </div>
        
        <section class="section_form">
            <h4 class="centralizar text-secondary">Eleições</h4>
            <form>
                <div class="mb-3">
                    <div class="form-text"></div>
                    <label for="valido" class="form-label">Votos Válidos</label>
                    <input type="text" class="form-control text-end alert-danger" name="valido" id="valido">

                </div>
                <div class="mb-3">
                    <label for="branco" class="form-label">Votos em Branco</label>
                    <input type="text" class="form-control text-end" name="branco" id="branco">
                </div>
                <div class="mb-3">
                    <label for="nulo" class="form-label">Votos Nulos</label>
                    <input type="text" class="form-control text-end" name="nulo" id="nulo">
                </div>

                <button type="submit" class="btn btn-primary" name="enviar">Enviar</button> &nbsp;
                <a href="exerc7.php">

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