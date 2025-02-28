<?php
$numero = rand(1,100);
for($attempt = 1 ; $attempt < 6 ; $attempt++){
    echo "Digite um numero: \n";
    $guess = readline();
    if ($guess == $numero){
        echo "Parabens! você acertou!";   
        break;
    }
    else{
        echo "tente novamente! \n";
        echo "Numero de tentativas: $attempt \n";
    }
}
?>