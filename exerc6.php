<?php
include('utils.php');
$alert = null;
$msg = "";
$kmini = null;
$kmfim = null;
$lts = null;
$preco = null;
$percurso = 0;
$vl_lt = 0;
$cons_lts = 0;

if (isset($_GET['sender'])) {

    $kmini = format_numero_float($_GET['kmini']);
    $kmfim = format_numero_float($_GET['kmfim']);
    $lts = format_numero_float($_GET['lts']);
    $preco = format_numero_float($_GET['preco']);
    if (
        is_numeric($kmini) &&
        is_numeric($kmfim) &&
        is_numeric($lts) &&
        is_numeric($preco)
    ) {
        $alert = true;
        $percurso = $kmfim - $kmini;
        $vl_lt = $lts * $preco;
        $cons_lts = $percurso / $lts;

        $vl_lt = number_format($vl_lt, 2, ',', '.');

        $cons_lts = number_format($cons_lts, 2, ',', '.');

        $preco = number_format($preco, 2, ',', '.');

        $percurso = number_format($percurso, 2, ',', '.');

        $kmfim = number_format($kmfim, 2, ',', '.');

        $kmini = number_format($kmini, 2, ',', '.');
    } else {
        $alert = false;
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
    <h2 class="centralizar text-primary">Exercício 6</h2>
    <main>
        <div class="menu_v">

            <?php
            echo menu();
            ?>
        </div>

        <section class="section_form">
            <h4 class="centralizar text-secondary">Consumo de combustível...</h4><br />

            <form class="row g-3">
                <div class="col-md-6">
                    <label for="km-inicial" class="form-label">Km inicio</label>
                    <input type="text" name="kmini" value="<?= $kmini ?>" class="form-control" id="km-inicial">
                </div>
                <div class="col-md-6">
                    <label for="km-final" class="form-label">Km final</label>
                    <input type="text" name="kmfim" value="<?= $kmfim ?>" class="form-control" id="km-final">
                </div>
                <div class="col-md-6">
                    <label for="consumo-litros" class="form-label">Litros</label>
                    <input type="text" name="lts" value="<?= $lts ?>" class="form-control" id="consumo-litros">
                </div>
                <div class="col-md-6">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="text" name="preco" value="<?= $preco ?>" class="form-control" id="preco">
                </div>
                <div class="col-12">
                    <button type="submit" name="sender" class="btn btn-primary">Relatório</button>
                    <a href="exerc6.php">
                        <button type="button" class="btn btn-secondary">Limpar</button>
                    </a>

                </div>
            </form>
            <br />
            <?php

           if (!is_null($alert)) {
                if($alert){
                  echo "
               
                    <div class='container text-center'>
                        <div class='row bg-success text-light'>
                            <div class='col border border-light'>
                                Km Percorrido
                            </div>

                            <div class='col border'>
                                Qtde. de Combustível
                            </div>
                            <div class='col border'>

                                Km/Litro
                            </div>
                            <div class='col border'>

                                Custo em R$
                            </div>
                        </div>
                    </div>


                    <div class='container text-center'>
                        <div class='row text-info'>
                            <div class='col border border-white '>
                                $percurso
                            </div>

                            <div class='col border  border-white'>
                                $lts
                            </div>
                            <div class='col border  border-white'>

                            $cons_lts
                            </div>
                            <div class='col border  border-white'>
                                R$ $vl_lt

                            </div>
                        </div>
                    </div>";
                }else{
                    echo "
                      <div class='_alert'>
                      <div class='alert alert-warning' role='alert'>
                          <p>Preencha todos os campos com números </p> </div>
              
                      </div>
                      ";
                }
           }
            ?>
            
                
            

        </section>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>