<?php 
$numerosa = [1,2,3,4,5,6,7,8,9,10];
for ($i = 0; $i < 10; $i++){
echo"Informe o numero: ";
$numerosb = readline();
$numerosa[$i] = $numerosb;
}

echo "DIGITE UM NUMERO MULTIPLICADOR: \n";
$numeromulti = readline();

for ($i = 0; $i < 11; $i++){
$numerosc = ($numerosa [$i] * $numeromulti);
echo $numerosc . PHP_EOL;
}
?>