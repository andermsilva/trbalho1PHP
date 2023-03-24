<?php
include('utils.php');

$msg = "";
$tr = 0;
$resposta = null;
if (isset($_GET['enviar'])) {
    $num =  $_GET['numero'];
    $_num = format_numero_float($num);

    if (!empty($_num) && is_numeric($_num)) {
        

        if($_num > 10){
            $resposta = "O valor $_num é maior que 10(dez).";
            $text_color = "text-success";
        }else if($_num < 10){
            
            $resposta = "O valor $_num é menor que 10(dez).";
            $text_color = "text-danger";
            
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
    <h2 class="centralizar text-primary">Exercício 3</h2>
    <main>
        <div class="menu_v">

            <?php
            echo menu();
            ?>
        </div>

        <section class="section_form">
            <form>
                <div class="mb-3">
                    <div class="form-text"></div>
                    <label for="numero" class="form-label"> Informe um numero.</label>
                    <input type="text" class="form-control " name="numero" id="valor"><br />

                    <button type="submit" class="btn btn-primary" name="enviar" value="1">Enviar</button> &nbsp;
                </div>
                <div class="mb-3">
                    <label for="result" class="form-label">Resposta</label>
                    <input type="text" 
                            class="form-control <?=$text_color?>" id="result" readonly
                            value="<?=$resposta?>">
                </div>

                <a href="exerc3.php">
                    <button type="button" class="btn btn-secondary">Reset</button>
                </a>
            </form>
           
        </section>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>