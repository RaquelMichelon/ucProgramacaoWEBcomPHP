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
   $saldoAtualConta1 = $conta1->mostrarSaldo();

   $conta2->depositar(5000);
   $conta2->sacar(1000);
   $saldoAtualConta2 = $conta2->mostrarSaldo();

   echo "<p> De acordo com as operações de depósito e saque efetuadas em ambas as contas, temos o seguinte resultado: <br>
   Saldo atual da conta1 = <span> R$$saldoAtualConta1 </span> <br>
   Saldo atual da conta2 = <span> R$$saldoAtualConta2 </span> </p>";   
  ?>  
</body> 
</html> 