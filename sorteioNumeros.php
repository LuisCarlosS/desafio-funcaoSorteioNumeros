<?php
$numerosSorteados = [];
for ($index = 1; $index <= 20; $index++) {
    $numeroSorteado = random_int(1, 10);
    array_push($numerosSorteados, $numeroSorteado);
}
function numerosNaoDuplicados($arrayNumeros)
{
    $numerosNaoRepetidos = [];
    foreach($arrayNumeros as $numero){
        $vezesNumero = 0;
        foreach ($arrayNumeros as $num){
            if ($numero === $num) {
                $vezesNumero++;
            }
            
        }
        if ($vezesNumero === 1) {
            array_push($numerosNaoRepetidos, $numero);
        }
    }
    return $numerosNaoRepetidos;
}
function retornaNumerosNaoRepetidos($arrayNumerosNaoRepetidos)
{   
    $tamanhoArray = count($arrayNumerosNaoRepetidos);
    if ($tamanhoArray === 0) {
        return "Todos os números sorteados se repetem!";
    }
    $frase = "";
    if ($tamanhoArray === 1) {
        return "O número que não se repete é o {$arrayNumerosNaoRepetidos[0]}.";
    } else {
        $frase = "Os números que não se repetem são";
    }

    foreach($arrayNumerosNaoRepetidos as $index => $numero) {
        $penultimoElemento = $index === $tamanhoArray - 2;
        $ehUltimoElemento = $index + 1 === $tamanhoArray;

        if (!$ehUltimoElemento) {
            $virgula = $tamanhoArray > 2 && !$penultimoElemento ? "," : "";
            $frase .= " $numero";
            $frase .= $virgula;
        } else {
            $frase .= " e $numero.";
        }
    }
    return $frase;
}
function retornaArrayEmString($arrayNumerosSorteados)
{
    $arrayEmString = "[";
    $tamanhoArray = count($arrayNumerosSorteados);
    foreach($arrayNumerosSorteados as $index => $numero){
        $arrayEmString .= $index + 1 === $tamanhoArray ? "$numero]" : "$numero,";
    }
    return "Array sorteado = $arrayEmString";
}

echo retornaArrayEmString($numerosSorteados) . "<br>";
echo retornaNumerosNaoRepetidos(numerosNaoDuplicados($numerosSorteados));