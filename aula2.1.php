<?php

$alunos = [
    "nome" => [1,2,3,4,5,6,7,8,9,10],
    "nota" => [1,2,3,4,5,6,7,8,9,10],    
];
for ($i = 0; $i < 10; $i++){
echo"Digite o nome do aluno: \n";
$nome = readline();
echo"Bota a Nota: \n";
$nota = readline();
$alunos['nome'][$i] = $nome;
$alunos['nota'][$i] = $nota;


}

for ($i = 0; $i < 10; $i++){
    echo "NOMES: " . $alunos['nome'][$i] . PHP_EOL;
    echo "NOTAS: " . $alunos['nota'][$i] . PHP_EOL;
}
    ?>