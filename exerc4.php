<?php
include('utils.php');
$alert = null;
$msg = "";

$resposta = null;
if (isset($_GET['enviar'])) {
    $_num =  $_GET['numero'];
      
    if (!empty($_num) && is_numeric($_num) || $_num==0) {
       
        if($_num > 0){
            $resposta = "O valor é maior que 0(zero).";
            $text_color = "text-success";
        }else if($_num < 0){
           
            $resposta = "O valor é menor que 0(zero).";
            $text_color = "text-danger";
            
        }else{
            
            $resposta = "O valor é igual a 0(zero).";
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

                <a href="exerc4.php">
                    <button type="button" class="btn btn-secondary">Reset</button>
                </a>
            </form>
           <?php 
            $zero;
           ?>
        </section>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>