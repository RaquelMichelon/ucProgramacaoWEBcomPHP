<!DOCTYPE html> 
<html lang="pt-BR"> 
 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Compra de medicamentos - vetores em PHP </h1>
 <?php  
  $precos = ["Aspirina"   => 25.12,
             "Rivotril"   => 88.00,
             "Ritalina"   => 112.80];
 
  if(!isset($_POST["medicamentos"]))
   {
   echo "<p> Caro cliente, você optou por não adquirir nenhum medicamento de nossa farmácia. Valor final da compra a ser pago = <span> R$0,00. </span> </p>";     
   }

  else
   {   
   $medicamentos = $_POST['medicamentos']; //é um vetor

   //cálculo da soma da despesa com a compra dos medicmanetos
   $soma = 0;

   foreach($medicamentos as $indice => $nomeDoRemedio)
    {
    $soma = $soma + $precos[$nomeDoRemedio];
    }

    //testar se o cliente tem 60 anos ou mais
    if(isset($_POST["idade"]))
     {
     //sim, ele tem mais de 60 anos
     $taxaDesconto = 5/100;
     }

    else 
     {
     //não tem 60 anos ou mais
     $taxaDesconto = 0;
     }

    //cálculo do valor final da compra do cliente
    $somaFinal = $soma *  (1-$taxaDesconto);
 
    $somaFinalFormatada = number_format($somaFinal, 2, ",", ".");
    echo "<p> De acordo com os medicamentos adquiridos, o valor final da compra a ser pago pelo cliente é de <span> R$$somaFinalFormatada </span> </p>"; 
   }   
 ?>  
</body> 
</html> 
