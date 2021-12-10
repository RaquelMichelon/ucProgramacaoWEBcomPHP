<!DOCTYPE html> 
<html lang="pt-BR"> 
 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Processando as compras da loja com PHP - resposta da aplicação </h1>
 <?php 
  //antes de receber o valor da compra, vamos usar um comando da linguagem PHP para testarmos o conteúdo de qualquer caixa numérica. No nosso exemplo, queremos que o usuário digite apenas valores numéricos
  $valorCompra = $_POST['valor-compra'];

  if (filter_var($valorCompra, FILTER_VALIDATE_FLOAT))
   {
   //agora, testamos se o botão de rádio foi marcado
   if(isset($_POST['forma-pagamento']))
    {
    //agora, descobrimos qual a forma de pagamento utilizada
    $formaPagamento = $_POST["forma-pagamento"];

    if($formaPagamento == "Vista")
     {
     //cálculo do valor final da compra após o desconto de 5%     
     $valorFinalCompra = $valorCompra * 95/100;
     }
    else
     {
     //cálculo do valor final da compra após o acréscimo de 2%  
     $valorFinalCompra = $valorCompra * 102/100;
     } 

    //testar se o checkbox está marcado
    if(isset($_POST['cartao']))
     {
     //o cliente pagou com Visa e pode participar do sorteio
     $mensagem = "O cliente pagou com cartão Visa e está apto a participar do sorteio do automóvel.";
     }
    else
     {
     //o cliente não pagou com Visa e não pode participar do sorteio 
     $mensagem = "O cliente não pagou com cartão Visa e não está apto a participar do sorteio do automóvel."; 
     }

    //mostrando o valor final da compra
    $valorFinalDaCompraFormatado = number_format($valorFinalCompra, 2, ",", ".");
    echo "<p> Valor final da compra a ser pago pelo cliente: <span> R$$valorFinalDaCompraFormatado </span> <br> $mensagem </p>";
    }
   else
    {
    die("<p> Caro usuário, a forma de pagamento usada pelo cliente é um dado obrigatório. Tente novamente! </p>");   
    }
   } 
  else
   {
   die("<p> Caro usuário, o valor da compra efetuada pelo cliente é um dado obrigatório. Tente novamente! </p>");  
   }  
 ?>  
</body> 
</html> 
