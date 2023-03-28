<?php
function menu()
{
    return " <ul>
    <li> <a href='index.php'> Home </a></li>
    <li><a href='exerc1.php'>Exercício 1</a></li>
    <li><a href='exerc2.php'>Exercício 2</a></li>
    <li><a href='exerc3.php'>Exercício 3 </a></li>
    <li><a href='exerc4.php'>Exercício 4 </a></li>
    <li><a href='exerc5.php'>Exercício 5 </a></li>
    <li><a href='exerc6.php'>Exercício 6 </a></li>
    <li><a href='exerc7.php'>Exercício 7 </a></li>
    <li><a href='exerc8.php'>Exercício 8 </a></li>
    <li><a href='exerc9.php'>Exercício 9 </a></li>
    <li><a href='exerc10.php'>Exercício 10 </a></li>
    <li><a href='exerc11.php'>Exercício 11 </a></li>
    <li><a href='#'>Sobre Nós </a></li>
    
    </ul>";
}
//==================================================\\

function format_numero_float($numero)
{


    $_format = str_replace(['.'], ' ', $numero);
    $_format = str_replace([','], '.', $_format);
    $result = str_replace([' '], '', $_format);


    return $result;
}
