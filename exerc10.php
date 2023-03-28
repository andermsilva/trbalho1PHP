<?php
include('utils.php');
$alert = null;
$msg = "";
$_num = null;
$resposta = null;
if (isset($_GET['enviar'])) {
    // $_num =  $_GET['numero'];
    $_num = format_numero_float($_GET['numero']);
    if (is_numeric($_num) ) {
        $alert=true;

        if ($_num > 0) {
            if ($_num % 2 == 0) {
                $msg = "<div class='alert alert-success' role='alert'>";
                $msg .= " <p>O número é <strong>positivo</strong> ";
                $msg .= " e <i><strong> Par</strong></i></p></div>";
                $text_color = "text-success";
            } else {
                $msg = "<div class='alert alert-success' role='alert'>";
                $msg .= "<p>O número é <strong>positivo</strong> ";
                $msg .= "e <i><strong> Ímpar</strong></i></p></div>";
                $text_color = "text-success";
            }
        } else if ($_num < 0) {
            if ($_num % 2==0) {
                
                $msg = "<div class='alert alert-warning' role='alert'>";
                $msg .= "<p>O número é <strong>negativo</strong> ";
                $msg .= "e <i><strong> Par</strong></i></p></div>";
                $text_color = "text-danger";
            }else{
                
                $msg = "<div class='alert alert-warning' role='alert'>";
                $msg .= "<p>O número é <strong>negativo</strong> ";
                $msg .= "e <i><strong> Ímpar </strong></i></p></div>";
                $text_color = "text-danger";
            }
        } else {
            
            $msg = "<div class='alert alert-danger' role='alert'>";
            $msg .= "<p> Zero é um número par porque é divisível ";
            $msg .= "por 2 sem resto. 0 não é positivo nem negativo.</p></div>";
            $text_color = "text-primary";
        }
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
    <h2 class="centralizar text-primary">Exercício 4</h2>
    <main>
        <div class="menu_v">

            <?php
            echo menu();
            ?>
        </div>

        <section class="section_form">
            <h4 class="centralizar text-secondary">Positivo ou negativo</h4>
            <form>
                <div class="mb-3">
                    <div class="form-text"></div>
                    <label for="numero" class="form-label"> Informe um numero.</label>
                    <input type="text" class="form-control "value="<?=$_num?>" name="numero" id="numero"><br />

                    <button type="submit" class="btn btn-primary" name="enviar" value="1">Enviar</button> &nbsp;
                    <a href="exerc10.php">
                        <button type="button" class="btn btn-secondary">Reset</button>
                    </a>
                </div>
            </form>
            <br />
            <div class="_alert">

                <?php

                if (!is_null($alert)) {
                    if ($alert) {
                        echo $msg;
                    }
                }
                ?>
            </div>
        </section>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>