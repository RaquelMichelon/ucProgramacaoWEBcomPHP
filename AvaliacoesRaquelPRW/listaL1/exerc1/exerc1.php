<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Programação WEB com PHP</title>
    <link rel="stylesheet" href="formata-formulario.css">
</head>
<body>
    <h1> Cálculo de médias com PHP - resposta da aplicação </h1>
    <?php
    //área de comandos php
    /* Posso abrir as áreas de execuçao quantas
    vezes eu quizer 
    comando de saída é "echo"
    */
    //echo "<p> Olá </p>";

    //neste ponto, o php já recebeu os dados do navegador e já disponibilizou estes dados no vetor $_POST. Agora acessamos cada célula deste vetor e guardamos os dados em variáveis simples.
/*
echo "<pre>"; //texto preformatado
print_r($_POST); 
echo  "</pre>";
*/


    $nomeDoAluno = $_POST["aluno"];
    $nota1 = $_POST["nota1"];
    $peso1 = $_POST["peso1"];
    $nota2 = $_POST["nota2"];
    $peso2 = $_POST["peso2"];

    //cálculo da média aritmética ponderada

    $media = ($nota1 * $peso1 + $nota2 * $peso2)/($peso1 + $peso2);

    echo "<p> Caro(a) aluno(a), <span> $nomeDoAluno </span>, de acordo com os dados fornecidos, sua média aritmética ponderada na UC Programação Web é igual a <span> $media </span>.</p>";

    
    
    ?>
    
</body>
</html>