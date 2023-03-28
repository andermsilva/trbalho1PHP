<?php
include('utils.php');
$alert = null;
$msg = "";
$_num = null;
$resposta = null;
if (isset($_GET['enviar'])) {
    // $_num =  $_GET['numero'];
    $_num = format_numero_float($_GET['idade']);
    if (is_numeric($_num)) {

        $alert = true;
        if ($_num >= 5 && $_num <= 7) {

            $msg = "<div class='alert alert-success' role='alert'>";
            $msg .= " <p> <strong>Infantil A </strong> </p></div>";
        }
        if ($_num >= 8 && $_num <= 11) {
            $msg = "<div class='alert alert-success' role='alert'>";
            $msg .= " <p> <strong>Infantil B </strong> </p></div>";
        }
        if ($_num == 12 || $_num == 13) {
            $msg = "<div class='alert alert-success' role='alert'>";
            $msg .= " <p> <strong>Juveil A </strong> </p></div>";
        }
        if ($_num >= 14 && $_num <= 17) {
            $msg = "<div class='alert alert-success' role='alert'>";
            $msg .= " <p> <strong>Juveil B </strong> </p></div>";
        }
        if ($_num >= 18) {
            $msg = "<div class='alert alert-success' role='alert'>";
            $msg .= " <p> <strong>Adultos </strong> </p></div>";
        }

        if ($_num < 5) {
            $msg = "<div class='alert alert-success' role='alert'>";
            $msg .= " <p> <strong>Sem categoria </strong> </p></div>";
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
            <h4 class="centralizar text-secondary">Classificação de Nadadores</h4>
            <form>
                <div class="mb-3">
                    <div class="form-text"></div>
                    <label for="idade" class="form-label"> Informe Idade de nadador.</label>
                    <input type="text" class="form-control " value="<?= $_num ?>" name="idade" id="idade"><br />

                    <button type="submit" class="btn btn-primary" name="enviar" value="1">Enviar</button> &nbsp;
                    <a href="exerc11.php">
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
                    }else{
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