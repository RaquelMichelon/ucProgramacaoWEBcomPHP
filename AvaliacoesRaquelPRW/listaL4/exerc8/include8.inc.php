<?php

function calcularMediaAritmetica($nota1, $nota2, $nota3){
    $mediaCalculada = ($nota1 + $nota2 + $nota3) / 3;
    return $mediaCalculada;
}

function calcularMediaPonderada($nota1, $nota2, $nota3){
    $mediaCalculada = (($nota1 * 5) + ($nota2 * 3) + ($nota3 * 2)) / 10;
    return $mediaCalculada;
}

?>