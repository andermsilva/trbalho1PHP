<?php
include('utils.php');

$l1 = null;
$l2 = null;
$l3 = null;

$alert = null;
$msg = null;
date_default_timezone_set("America/Sao_Paulo");
if (isset($_GET['enviar'])) {
    $l1 = $_GET['l1'];
    $l2 = $_GET['l2'];
    $l3 = $_GET['l3'];
    $l1 = (int)$l1;
    $l2 = (int)$l2;
    $l3 = (int)$l3;
    $count = 0;


    if ($l1 > $l2 + $l3 || $l2 > $l1 + $l3 || $l3 > $l1 + $l2) {
        $count = 4;
    }
    if ($l1 == 0 || $l2 == 0 || $l3 == 0) {
        $count = 4;
    }

    $triangulo = [$l1, $l2, $l3];


    for ($i = 0; $i < count($triangulo); $i++) {

        $aux = $triangulo[$i];
        if ($i != 0) {
            if ($aux == $triangulo[$i - 1]) {
                $count++;
            }
        } else {

            $count++;
        }
    }
  
    $alert = true;
    switch ($count) {
        case 1:
            $msg = "<div class='alert alert-warning' role='alert'>";
            $msg .= "<p>Triângulo Escaleno</p> </div>";
            break;
        case 2:
            $msg = "<div class='alert alert-info' role='alert'>";
            $msg .= "<p>Triângulo Isócelis</p> </div>";
            break;
        case 3:
            $msg = "<div class='alert alert-success' role='alert'>";
            $msg .= "<p>Triângulo Equilátero</p> </div>";
            break;

        default:
            $msg = "<div class='alert alert-danger' role='alert'>";
            $msg .= "<p>Os números informados não formam um triângulo...</p> </div>";
            $l1 = null;
            $l2 = null;
            $l3 = null;
            break;
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
    <h2 class="centralizar text-primary">Exercício 8</h2>
    <main>
        <div class="menu_v">

            <?php
            echo menu();
            ?>
        </div>

        <section class="section_form">
            <h4 class="centralizar text-secondary">Triângulos</h4>

            <form>
                <div class="row row-cols-3">
                    <div class="col">

                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="l1" class="form-label">Lado 1</label>
                            <input type="text" class="form-control" value="<?= $l1 ?>" name="l1">
                        </div>
                        <div class="mb-3">
                            <label for="l2" class="form-label">Lado 2</label>
                            <input type="text" class="form-control" value="<?= $l2 ?>" name="l2">
                        </div>
                        <div class="mb-3">
                            <label for="l3" class="form-label">Lado 3</label>
                            <input type="text" class="form-control" value="<?= $l3 ?>" name="l3">
                        </div>
                        <div class="text-center">

                            <button type="submit" name="enviar" class="btn btn-primary">OK</button>
                            <a href="exerc9.php"> <button type="buttom" class="btn btn-secondary">Reset</button></a>
                        </div>
                    </div>
                    <div class="col"> </div>
            </form>
            </div>
            <div class="row row-cols-3">

                <div class="col">
                    <div style='
                        width:0px;
                        height:120px;
                        border-left: <?= $l1 ?>px solid transparent;
                        border-right: <?= $l2 ?>px solid transparent;
                        border-bottom: <?= $l3 ?>px solid red; '></div>
                </div>
              <!--   <svg>
  <polygon points="50,0 0,140 140,140"
  style="fill:red;stroke:purple;stroke-width:1"/>
</svg> -->


                <div class="col"> </div>
                <div class="col alert">
                    <?php

                    if (!is_null($alert)) {
                        if ($alert) {
                            echo $msg;
                        } else {
                            echo  $msg;
                        }
                    }
                    ?>

                </div>
            </div>


            <br />


            <div class="_alert">



            </div>

        </section>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>