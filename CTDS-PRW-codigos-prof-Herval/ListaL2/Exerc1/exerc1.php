<!DOCTYPE html> 
<html lang="pt-BR"> 
 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Cálculo de médias com vetores em PHP - resposta da aplicação </h1>
 <?php
  //vamos receber os dados do formulário e criar um vetor de índice numérico a partir deles - várias formas de se criar o vetor
  //indexação automática
  $notas[] = $_POST['nota1'];
  $notas[] = $_POST['nota2'];
  $notas[] = $_POST['nota3'];

  //outra forma
  $notas[0] = $_POST['nota1'];
  $notas[1] = $_POST['nota2'];
  $notas[2] = $_POST['nota3'];

  //outra forma 
  $notas = [$_POST['nota1'],
            $_POST['nota2'],
            $_POST['nota3']];

  //outra forma
  $notas = array($_POST['nota1'],
                 $_POST['nota2'],
                 $_POST['nota3']);

  //mostrar o vetor na página
  echo "<pre>";
  print_r($notas);
  echo "</pre>";

  //fazendo a soma das notas por meio de um comando específico do PHP, que trabalha com vetores numéricos
  $soma = array_sum($notas);

  $media = $soma / count($notas);

  $mediaFormatada = number_format($media, 1, ",", ".");

  echo "<p> Caro professor, de acordo com as notas fornecidas, a média calculada para os três alunos cadastrados é igual a <span> $mediaFormatada </span> </p>";  
 ?>  
</body> 
</html> 
