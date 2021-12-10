<?php
 class ContaBancaria {
   public $saldo;

   function __construct($saldoInicial) {
    $this->saldo = $saldoInicial;
   }

   //codigo getter nao traz nenhum parametro de fora da classe
   function mostrarSaldo() {
     return $this->saldo;
   }

   function depositar($valorASerDepositado) {
    $this->saldo = $this->saldo + $valorASerDepositado;
   }

   function sacar($valorASerSacado) {
    $this->saldo = $this->saldo - $valorASerSacado;
   }
 }