<?php
include('utils.php');
$alert = null;
$msg = "";
$_altura = null;
$_peso = null;
$resposta = null;
$cor = null;
if (isset($_GET['enviar'])) {
    // $_num =  $_GET['numero'];
    $_imc_ =0;
    $_altura= format_numero_float($_GET['altura']);
    $_peso = format_numero_float($_GET['peso']);
    if (is_numeric($_altura) && is_numeric($_peso)) {
      
        $alert = true;
        $_imc_ = $_peso / ($_altura*$_altura);
        if($_imc_ < 18.5){

            $cor1 = "alert alert-info";

            $alert = false;
            $msg = "<div class='alert alert-warning' role='alert'>";
            $msg .= " <p> ".number_format($_imc_,2,',','.')." IMC abaixo do recomenda </p></div>";
        }else if($_imc_ >= 18.5 && $_imc_ < 25){

            $cor2 = "alert alert-info";
            $alert = false;
            $msg = "<div class='alert alert-warning' role='alert'>";
            $msg .= " <p> ".number_format($_imc_,2,',','.')." IMC normal parabéns </p></div>";
        }else if($_imc_ >= 25 && $_imc_ < 30){

            $cor3 = "alert alert-info";
            $alert = false;
            $msg = "<div class='alert alert-warning' role='alert'>";
            $msg .= " <p> ".number_format($_imc_,2,',','.')." IMC indica sobre peso </p></div>";
        }else if($_imc_ >= 30 && $_imc_ < 40){

            $cor4 = "alert alert-info";
            $alert = false;
            $msg = "<div class='alert alert-warning' role='alert'>";
            $msg .= " <p> ".number_format($_imc_,2,',','.')." IMC indica obesida </p></div>";
        }else {
 
            $cor5= "alert alert-info";
            $alert = false;
            $msg = "<div class='alert alert-warning' role='alert'>";
            $msg .= " <p> ".number_format($_imc_,2,',','.')." IMC indica Obesidade Grave </p></div>";
        }
        
        
    } else {
        $alert = false;
        $msg = "<div class='alert alert-warning' role='alert'>";
        $msg .= " <p> <strong>Informe a idade somente com números... </strong> </p></div>";
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
    <h2 class="centralizar text-primary">Exercício 11</h2>
    <main>
        <div class="menu_v">

            <?php
            echo menu();
            ?>
        </div>

        <section class="section_form">
            <h4 class="centralizar text-secondary">Classificação de IMC</h4>
            <form>
                <div class="mb-3">

                    <label for="peso" class="form-label"> Informe seu peso.</label>
                    <input type="text" class="form-control " value="<?= number_format($_peso,2,',','.')?>" name="peso" id="peso"><br />
                    
                    <label for="altura" class="form-label"> Informe sua altura.</label>
                    <input type="text" class="form-control " value="<?=number_format($_altura,2,',','.') ?>" name="altura" id="altura"><br />

                    <button type="submit" class="btn btn-primary" name="enviar">Enviar</button> &nbsp;
                    <a href="exerc13.php">
                        <button type="button" class="btn btn-secondary">Reset</button>
                    </a>
                </div>
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
                <table class="table table-striped" cellspacing="0">

                    <thead >
                        <tr>
                            <td colspan="3">Veja a interpretação do IMC</td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="">
                            <td>IMC</td>
                            <td>Classificação</td>
                            <td style="text-align: center">Obesidade <small>(grau)</small></td>
                        </tr>

                        <tr id="result_calc_0" class="<?=$cor1?>">
                            <td>Menor que 18,5</td>
                            <td>Magreza</td>
                            <td style="text-align: center">0</td>
                        </tr>

                        <tr id="result_calc_1" class="<?=$cor2?>">
                            <td>Entre 18,5 e 24,9</td>
                            <td>Normal</td>
                            <td style="text-align: center">0</td>
                        </tr>

                        <tr id="result_calc_2" class="<?=$cor3?>">
                            <td>Entre 25,0 e 29,9</td>
                            <td>Sobrepeso</td>
                            <td style="text-align: center">I</td>
                        </tr>

                        <tr id="result_calc_3" class="<?=$cor4?>" >
                            <td>Entre 30,0 e 39,9</td>
                            <td>Obesidade</td>
                            <td style="text-align: center">II</td>
                        </tr>

                        <tr id="result_calc_4" class="<?=$cor5?>">
                            <td>Maior que 40,0</td>
                            <td>Obesidade Grave</td>
                            <td style="text-align: center">III</td>
                        </tr>
                    </tbody>

                </table>

            </div>
        </section>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>