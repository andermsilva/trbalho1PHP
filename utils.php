<?php 
function menu(){
    return " <ul>
    <li> <a href='index.php'> Home </a></li>
    <li><a href='exerc1.php'>Exercício 1</a></li>
    <li><a href='exerc2.php'>Exercício 2</a></li>
    <li><a href='#'>Contatos </a></li>
    <li><a href='#'>Sobre Nós </a></li>
    
    </ul>";
    }
    //==================================================\\

    function format_numero_float($numero){
           
        $_format = str_replace(['.'],'-', $numero);
        $_format = str_replace([','],'.', $_format);
        $result = str_replace(['-'],'', $_format);
        return $result;
    }

?>