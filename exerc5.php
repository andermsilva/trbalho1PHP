<?php
include('utils.php');
$alert = null;
$msg = "";
$n1=0;
$n2=0;
$n3=0;
$n4=0;
$media = 0;
if (isset($_GET['calc'])) {
   
    $n1 = format_numero_float($_GET['n1']);
    $n2 = format_numero_float($_GET['n2']);
    $n3 = format_numero_float($_GET['n3']);
    $n4 = format_numero_float($_GET['n4']);
    if (
        is_numeric($n1) &&
        is_numeric($n2) &&
        is_numeric($n3) &&
        is_numeric($n4)
       ) {

        $alert =true;
        $media =( $n1 + $n2 + $n3 +$n4) /4;
        if($media >= 7){

            $msg = "<div class='alert alert-success' role='alert'>";
            $msg .= "<p>Aluno aprovado. Média: ".number_format($media,2,',','.')."</p> </div>";
        }else{
            $msg = "<div class='alert alert-danger' role='alert'>";
            $msg .= "<p>Aluno reprovado Média: ".number_format($media,2,',','.')."</p> </div>";
        }
       }else{
        $alert = false;
        
        $msg = "<div class='alert alert-warning' role='alert'>";
        $msg .= "<p>Preencha todos os campos com números </p> </div>";

       }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles_tb.css" />
    <title> PHP</title>
</head>

<body>
    <header>

    </header>
    <h2 class="centralizar text-primary">Exercício 5</h2>
    <main>
        <div class="menu_v">

            <?php
            echo menu();
            ?>
        </div>

        <section class="section_form">
            <h4 class="centralizar text-secondary">Notas...</h4>
            <form>
                <div class="row">
                    <div class="col">
                        <div class="form-text">Nota 1</div>

                        <input type="text" class="form-control" name="n1">
                    </div>
                    <div class="col">
                        <div class="form-text">Nota 2</div>

                        <input type="text" class="form-control" name="n2">
                    </div>

                    <div class="col">
                        <div class="form-text">Nota 3</div>

                        <input type="text" class="form-control" name="n3">
                    </div>

                    <div class="col">
                        <div class="form-text">Nota 4</div>

                        <input type="text" class="form-control" name="n4">
                    </div>

                </div><br />
                <div class="row">
                    <div class="col center">

                        <button type="submit" class="btn btn-primary" name="calc">Calcular</button>
                      
                        <a href="exerc5.php">
                            <button type="button" class="btn btn-secondary">Reset</button>
                        </a>
                    </div>
                </div>
            </form><br />

            <div class="_alert">

                <?php

                if (!is_null($alert)) {
                    if($alert){
                       echo $msg;
                    }else{
                        
                        echo $msg;
                    }

                }
                ?>
            </div>
            
        </section>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>