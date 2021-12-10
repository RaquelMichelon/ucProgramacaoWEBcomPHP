<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Fundamentos da POO com PHP - atividade3 </h1>
  <?php   
   require_once "atividade3.inc.php"; 

   $conta1 = new ContaBancaria(1000);
   $conta2 = new ContaBancaria(5000);

  $conta1->depositar(1000);
  $conta1->sacar(300);
  $saldoAtual1 = $conta1->mostrarSaldo();

  $conta2->depositar(5000);
  $conta2->sacar(1000);
  $saldoAtual2 = $conta2->mostrarSaldo();


   echo "<p> Resultado : <br>
   Saldo atual conta 1 = $saldoAtual1  <br> <br>
   Saldo atual conta 2 = $saldoAtual2  <br> </p>";   
  ?>  
</body> 
</html> 