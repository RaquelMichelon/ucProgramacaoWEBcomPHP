<?php
 class ContaBancaria 
  {
  public $saldo;
  
  //método construtor da classe
  function __construct($saldoInicial)
   {
    $this->saldo = $saldoInicial;
   }

  //método getter para recuperar o valor do saldo atual
  function mostrarSaldo()
   {
   return $this->saldo;
   }

  //método setter para depositar na conta
  function depositar($valorASerDepositado)
   {
   $this->saldo = $this->saldo + $valorASerDepositado;
   }

  //método setter paar sacar um valor da conta
  function sacar($valorASerSacado)
   {
   $this->saldo = $this->saldo - $valorASerSacado;
   }  
  }
 
