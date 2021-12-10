<!DOCTYPE html> 
<html lang="pt-BR"> 
 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Processando as compras de supermercado com PHP - resposta da aplicação </h1>
 <?php  
  $valorCompra = $_POST['valor-compra'];

  //agora, o que devemos fazer é testar se o checkbox relacionado ao pagamento com cartão foi marcado
  if(isset($_POST['forma-pagamento']))
   {
   $taxaDesconto = 5/100;  
   }

  else
   {
   $taxaDesconto = 0;
   }

  //usamos o mesmo procedimento para testar o checkbox de entrega a domicílio
  if(isset($_POST['entrega-domicilio']))
   {
   $taxaAcrescimo = 2/100;
   }

  else 
   {
   $taxaAcrescimo = 0;
   }

  //agora que temos os percentuais aplicados pelo PHP em cada situação, vamos calcular o valor final da compra do cliente
  $valorParcialCompra = $valorCompra * (1-$taxaDesconto);

  //aplicamos o mesmo procedimento para o cálculo do acréscimo
  $valorFinalCompra = $valorParcialCompra * (1+$taxaAcrescimo);
  
  //ao final do código, mostramos ao operador de caixa o valor final da compra do cliente do nosso supermercado
  $valorFinalCompraFormatado = number_format($valorFinalCompra, 2, ",", ".");

  echo "<p> Prezado cliente, depois de efetuado todo o processamento de sua compra, o valor final a ser pago será de <span> R$$valorFinalCompraFormatado </span> </p>";
 ?>  
</body> 
</html> 
