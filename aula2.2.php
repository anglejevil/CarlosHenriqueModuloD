<?php 
$numerosa = [1,2,3,4,5,6,7,8,9,10];
$positivo = 0;
$negativo = 0;
$par = 0;
$impar = 0;

for ($i = 0; $i < 10; $i++){
echo"Informe o numero: ";
$numerosb = readline();
$numerosa[$i] = $numerosb;
if ($numerosa [$i]>0) {$positivo++;
}
else {$negativo++;
}
if ($numerosa[$i] % 2 == 0) {$par++;
}
else {$impar++;
}}


echo"POSITIVOS: " . $positivo . PHP_EOL;
echo"NEGATIVOS: " . $negativo . PHP_EOL;
echo"PARES: " . $par . PHP_EOL;
echo"IMPARES: " . $impar . PHP_EOL;

?>