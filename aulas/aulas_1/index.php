<?php

    $mensagem = 'Olá, mundo!';
    echo $mensagem;

    echo '<h2> Olá, mundo</h2>';

    $primeiro_nome = 'Julia';
    $idade = 18;
    $gosta_de_bolo = true;

    $resultado_ano = 2025 - $idade;

    echo $resultado_ano;

    echo '<br>';

    $num = 37.5;

    echo $num;

    $num2 = (int) $num;
    echo '<br>';
    echo $num2;

    $nota = 2;

    if ($nota >= 7){
        echo '<p>Passou na prova</p>';

    }else if($nota == 2){
        echo '<p>Como você fez isso</p>';
    } else{
         echo '<p>Não passou na prova</p>';
    }

    for($i = 0; $i <=5; $i++){

        //echo '<p> Contagem:'. $i . '</p>';

        echo "<p> Contagem: $i </p>";

    };

    $frutas = array('laranja','bananas','tomate','bergamota');

    echo $frutas[1];

    function saudacao ($nome){
        return "Olá, %nome";

    };

    echo saudacao ('Hisabel');

    

?>