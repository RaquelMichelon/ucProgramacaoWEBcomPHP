<!DOCTYPE html> 
<html lang="pt-BR"> 
 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Processamento de vendas com vetores em PHP </h1>
 <?php
  //vamos criar um vetor armazenando o preço para cada produto do carrinho virtual
  $precos = ["Impressora" => 320.12,
             "Celular"    => 800.00,
             "Notebook"   => 2000.80];
  
  //antes de prosseguir, testamos se algum botão checkbox foi marcado no formulário
  if(!isset($_POST["produtos"]))
   {
   //o usuário não escolheu nenhum produto para compra
   echo "<p> Caro cliente, você optou por não adquirir nenhum produto de nossa loja virtual. Valor final da compra a ser pago = <span> R$0,00. </span> </p>";     
   }

  else
   {
   //o cliente comprou um ou mais produtos. Vamos fazer o PHP receber estes dados. Lembrar que o PHP recebe os dados de qualquer checkbox e os armazena em um vetor. No nosso caso, os values de cada checkbox marcado pelo usuário estarão no vetor de índice numérico $produtos
   $produtos = $_POST['produtos'];

   /*echo "<pre>";
   print_r($produtos);
   echo "</pre>";*/

   //para calcularmos o valor final da compra do cliente, percorremos o vetor de produtos e, para cada produto adquirido, descobrimos qual é o seu preço no vetor precos. Em seguida, acumulamos o preço de cada produto em uma variável somatória
   $soma = 0;

   foreach($produtos as $indice => $nomeDoProduto)
    {
    $soma = $soma + $precos[$nomeDoProduto];
    }
   
    $valorFinalCompraFormatado = number_format($soma, 2, ",", ".");
    echo "<p> De acordo com os produtos adquiridos, o valor final da compra a ser pago pelo cliente é de <span> R$$valorFinalCompraFormatado </span> </p>"; 
   }   
 ?>  
</body> 
</html> 
