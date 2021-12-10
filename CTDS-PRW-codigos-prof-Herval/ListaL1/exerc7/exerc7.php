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

  //antes do comando para receber o valor do botão de rádio selecionado, devemos fazer o PHP testar se um dos botões foi escolhido pelo usuário
  if(isset($_POST['forma-pagamento']))
   {
   //o botão de rádio foi marcado
   $pagouComCartao = $_POST['forma-pagamento'];

   //testamos para saber se o cliente pagou (ou não) com cartão
   if($pagouComCartao == "Sim")
    {
     //pagou com cartão. Damos um desconto de 5%
     $valorParcial = $valorCompra * 95/100;
    }
   else
    {
     $valorParcial = $valorCompra; 
    }
   }

  else
   {
   //o botão relacionado à forma de pagamento não foi selecionado. Enviamos uma mensagem ao usuário e finalizamos a aplicação, com o comando exit()
   exit("<p> Caro usuário, a forma de pagamento deve ser informada. Aplicação encerrada. Tente novamente! </p>"); //die()
   }

  //fazemos a mesma verificação anterior, agora aplicada aos botões de rádio relacionados à entrega a domicílio
  if(isset($_POST['entrega-domicilio']))
   {
   //o botão de rádio foi marcado
   $entregouDomicilio = $_POST['entrega-domicilio'];

   //testar se o cliente solicita entrega à domicílio
   if($entregouDomicilio == "Sim")
    {
    //o cliente pediu entrega a domicílio
    $valorFinalCompra = $valorParcial * 102/100;
    }
   else
    {
    //o cliente não pediu entrega a domicílio
    $valorFinalCompra = $valorParcial;
    }
   }

  else
   {
   //o botão relacionado à entrega a domicílio não foi selecionado. Enviamos uma mensagem ao usuário e finalizamos a aplicação, com o comando exit()
   exit("<p> Caro usuário, a opção para entrega a domicílio não foi marcada. Aplicação encerrada. Tente novamente! </p>"); //die()
   }

  //ao final do código, mostramos ao operador de caixa o valor final da compra do cliente do nosso supermercado
  $valorFinalCompraFormatado = number_format($valorFinalCompra, 2, ",", ".");

  echo "<p> Prezado cliente, depois de efetuado todo o processamento de sua compra, o valor final a ser pago será de <span> R$$valorFinalCompraFormatado </span> </p>";
 ?>  
</body> 
</html> 
