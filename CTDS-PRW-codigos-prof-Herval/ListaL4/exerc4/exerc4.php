<?php
 function calcularComissaoVendedor($valorInicialVenda, $percentComissao)
  {
  $comissao = $valorInicialVenda * $percentComissao/100;
  return $comissao;
  }

//====================================================================

 function calcularValorDesconto($valorInicialVenda)
  {
  if(isset($_POST['cartao-fidelidade']))
   {
   define("PERCENT_DESCONTO", 5/100);
   $desconto = $valorInicialVenda * PERCENT_DESCONTO;   
   }
  else
   {
   $desconto = 0;  
   }
  return $desconto;  
  }

//====================================================================

 function calcularValorFinalVenda($valorInicialVenda, $valorDesconto)
  {
  $valorFinalVenda = $valorInicialVenda - $valorDesconto;
  return $valorFinalVenda;
  }
?>
<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Processamento de vendas com funções de usuário em PHP </h1>
 <form action="exerc4.php" method="post">
  <fieldset>
   <legend> Dados da venda </legend>

   <label class="alinha"> Forneça o valor da venda: </label>
   <input type="number" name="valor-venda" step="0.01" min="0" autofocus>   <br> 

   <label class="alinha"> Forneça o percentual de comissão: </label>
   <input type="number" name="percent-comissao" step="0.01" min="0">   <br>

   <input type="checkbox" name="cartao-fidelidade[]" value="Sim"> Marque esta opção se o cliente pagou com cartão de fidelidade da loja  <br>

   <button name="enviar-dados"> Processar a venda </button>
  </fieldset>
 </form> 
  <?php   
   //área de declaração das funções com comando echo
   function mostrarResultado($valorInicialVenda, $percentComissao, $valorComissao, $valorDesconto, $valorFinalVenda)
    {
    echo "<p> Resultado do processamento da venda: <br>
              Valor inicial da venda = <span> R$$valorInicialVenda </span> <br>
              Percentual de comissão do vendedor = <span> $percentComissao% </span> <br>
              Valor da comissão do vendedor = <span> R$$valorComissao </span> <br>
              Valor do desconto do cliente = <span> R$$valorDesconto </span> <br>
              Valor final da venda ao cliente = <span> R$$valorFinalVenda </span> </p>";
    }

   //=====================script principal==============================

   if(isset($_POST["enviar-dados"]))
    {
    //recebendo os dados de entrada do formulário
    $valorInicialVenda = $_POST['valor-venda'];
    $percentComissao   = $_POST['percent-comissao'];

    //invocando a primeira função
    $valorComissao     = calcularComissaoVendedor($valorInicialVenda, $percentComissao);

    //invocando a segunda função
    $valorDesconto     = calcularValorDesconto($valorInicialVenda);

    //invocando a terceira função
    $valorFinalVenda   = calcularValorFinalVenda($valorInicialVenda, $valorDesconto);

    //invocando a quarta função
    mostrarResultado($valorInicialVenda, $percentComissao, $valorComissao, $valorDesconto, $valorFinalVenda);
   }   
  ?>  
</body> 
</html> 