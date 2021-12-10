<!DOCTYPE html> 
<html lang="pt-BR"> 
 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Processamento de vendas com PHP - resposta da aplicação web </h1>
 <?php
  $valorVenda      = $_GET["valor-venda"];

  //desconto dado ao cliente pela loja
  $descontoCliente = $_GET['valor-venda'] * 10/100;

  //desconto do ICMS
  $valorICMS       = $valorVenda * 12/100;

  //valor da comissão do vendedor
  $valorComissao   = $valorVenda * 5/100;

  $valorVendaFormatado      = number_format($valorVenda, 2, ",", ".");
  $descontoClienteFormatado = number_format($descontoCliente, 2, ",", ".");
  $valorComissaoFormatado   = number_format($valorComissao, 2, ",", ".");
  $valorICMSFormatado       = number_format($valorICMS, 2, ",", ".");

  echo "<p> Dados do processamento da venda: <br>
        Valor da venda = <span> R$$valorVendaFormatado </span> <br>
        Desconto do cliente = <span> R$$descontoClienteFormatado </span> <br>
        Valor da comissão do vendedor = <span> R$$valorComissaoFormatado </span> <br>
        Valor do ICMS pago = <span> R$$valorICMSFormatado </span> </p>";  
 ?>  
</body> 
</html> 
