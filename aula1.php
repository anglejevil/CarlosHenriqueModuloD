<?php 

echo"Informe o numero A: ";

$numeroa = (int) readline();

echo"Informe o numero B: ";

$numerob = (int) readline();

$subtrai = $numeroa - $numerob;

$adiciona = $numeroa + $numerob;

$divide = $numeroa / $numerob;

$multiplica = $numeroa * $numerob;

echo"Informe qual ação deseja fazer: 1 = Subtração, 2 = Adição, 3 = Divisão, 4 = Multiplicação ";

$escolha = 0;
$escolha = (int) readline();

If ($escolha == 1){

    //subtração

    echo $subtrai;

    if ($subtrai % 2 == 0) {

        echo " é um numero par";
    }
        else {
            echo " é um numero impar";
        }
    }

    elseif ($escolha == 2){
    
    //adição

    echo $adiciona;
        if ($adiciona % 2 == 0){
            echo " é um numero par";
        }
        else {
            echo " é um numero impar";
        }
    }

    elseif ($escolha == 3){

    //divisão

    echo $divide;
        if ($divide % 2 == 0){
            echo " é um numero par";
        }
        else {
            echo " é um numero impar";
        }
    }

    elseif ($escolha == 4){
    
    //multiplicação

    echo $multiplica;
        if ($multiplica % 2 == 0){
            echo " é um numero par";
        }
        else {
            echo " é um numero impar";
        }
    }
?>