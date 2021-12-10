<!DOCTYPE html> 
<html lang="pt-BR"> 
 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Dados da viagem com PHP - resposta da aplicação </h1>
 <?php
  //recebendo os dados do formulário por meio do vetor superglobal $_POST
  $distancia   = $_POST["distancia"];
  $autonomia   = $_POST['autonomia'];

  //receber o preço por litro pago e guaradar como uma constante
  define("PRECO_POR_LITRO", $_POST["preco"]);

  //calculando a quantidade de litros de gasolina gasta na viagem
  $litrosGastos = $distancia / $autonomia;

  //calculando a despesa com o combustível gasto
  $despesa = $litrosGastos * PRECO_POR_LITRO;

  $litrosGastosFormatado = number_format($litrosGastos, 1, ",", ".");
  $despesaFormatada = number_format($despesa, 2, ",", ".");

  echo "<p> Resultados do processamento dos dados da viagem: <br>
       Preço por litro = <span> R$", PRECO_POR_LITRO, "</span> <br>
       Gasto com a viagem (dinheiro) = <span> R$ $despesaFormatada </span> <br>
       Gasto com a viagem (combustível) = <span> R$ $litrosGastosFormatado litros </span> </p>";  
 ?>  
</body> 
</html> 
