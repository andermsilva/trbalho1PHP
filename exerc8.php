<?php
include('utils.php');
$alert = null;
$msg = "";
$valor = null;
$prest = null;
$table = null;
$soma = null;
$pgto = null;
$valor_pg = null;
$disabled = null;
$parc = null;
$saldo = null;
$paga = 0;
date_default_timezone_set("America/Sao_Paulo");
if (isset($_GET['enviar'])) {
    $act = $_GET['enviar'];
    $valor = $_GET['valor'];
    $prest = $_GET['prest'];
    $pgto = $_GET['pgto'];
    $valor_pg = 0;
    if ($act == 1 || $act == 2) {
        if (
            !empty($valor) && is_numeric($valor)
            && !empty($prest) && is_numeric($prest)
        ) {
            $alert = true;
            // $soma = 0;
            $soma += $valor + $valor * 0.03;
             

            $table = " <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Valor R$</th>
                    <th scope='col' class='text-center'>Data</th>
                    <th scope='col'  class='text-center'>Saldo </th>
                    <th scope='col'  class='text-end'>Pago</th>
                </tr>
            </thead>
            <tbody>";
            $date = date_create("01-05-2023");
             /* $saldo =$valor;
             $teste = $saldo; */
            for ($i = 0; $i < $prest; $i++) {
                date_modify($date, "+30 days");

                
                $parc = ($soma / $prest);
                
                
                if ($pgto == $prest) {
                    $disabled = "disabled";
                }
                $pago = "";
                if ($i < $pgto && $act == 2 ){
                    $valor_pg += $parc;
                    $saldo = ($soma - $valor_pg);
                    $saldo = number_format($saldo, 2, ',', '.');
                    $paga = "Sim";
                } else {
                   $paga = "Não";
                }
                
                if($paga == "Não"){
                    $saldo = "";
                }
                    
                    
                $table .= "<tr>
                   <th scope='row'>" . ($i + 1) . "</th>
                   <td> R$ " . number_format($parc, 2, ',', '.') . "</td>
                   <td class='text-center'>" . date_format($date, 'd/m/Y') . "</td>
                   <td class='text-end'>R$ " . $saldo."</td>
                   <td class='text-end'>$paga</td>
                   </tr> ";
            }
            $table .= "</tbody></table>";
        } else {
            $alert = false;
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
    <h2 class="centralizar text-primary">Exercício 8</h2>
    <main>
        <div class="menu_v">

            <?php
            echo menu();
            ?>
        </div>

        <section class="section_form">
            <h4 class="centralizar text-secondary">Prestações à pagar</h4>
            <form>
                <div class="container text-center">
                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="input-group mb-3">
                                <label class="">Parcelas: </label>&nbsp;

                                <input type="text" class="form-control text-end" value="<?= $prest ?>" name="prest" id="prest" placeholder="">

                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">

                                <label class="">Valor R$: </label>&nbsp;
                                <input type="text" class="form-control text-end" name="valor" value="<?= $valor ?>" id="valor" placeholder="">
                                <button class="btn btn-outline-secondary" name="enviar" value="1" type="submit" id="button-addon2">Lançar</button>
                            </div>
                        </div>
                        <div class="col alert alert-info">Pagamentos:
                            <div class="input-group mb-3">


                                <input type="text" class="form-control text-end" <?= $disabled ?> value="<?= $pgto ?>" name="pgto" id="pgto" placeholder="">
                                <button class="btn btn-outline-secondary" <?= $disabled ?> name="enviar" value="2" type="submit" id="button-addon2">Pagar</button>

                            </div>&nbsp;

                        </div>
                        <div class="col alert alert-info">Valor Total: R$
                            <input type="text" class="form-control text-end" readonly value="R$ <?= number_format($soma, 2, ',', '.') ?>" name="" id="pgto" placeholder="">

                        </div>
                    </div>
                  <!--   <div class="row row-cols-2">
                        <div class="col"><?= $pgto ?></div>
                        <div class="col"> R$ <?= number_format($valor_pg, 2, ',', '.') ?></div>

                    </div> -->
                </div>

                       <div class="row row-cols-2">
                        <div class="col">          </div>
                        <div class="col">          </div>
                        <div class="col">          </div>
                        <div class="col text-end">     
                            
                            <button type="submit" class="btn btn-primary">Reset</button>
                      </div>

                    </div>

            </form>
            <br />

            <?php
            echo $table;

            ?>
            <div class="_alert">

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

        </section>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>