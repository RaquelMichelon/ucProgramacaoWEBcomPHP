<?php
 //aqui, vamos definir a classe que implementa as propriedades e métodos necessários para a comunicação entre o nosso código em PHP e o banco de dados
 class BancoDeDados
  {
  public $nomeDoBanco;
  public $nomeDaTabela; 
  public $servidor;
  public $usuario;
  public $senha;  
  

 //criar o construtor personalizado da classe
 function __construct($servidorBanco, $usuarioBanco, $senhaBanco, $nomeBanco, $nomeTabela) 
  {
  $this->servidor = $servidorBanco;
  $this->usuario  = $usuarioBanco;
  $this->senha    = $senhaBanco;
  $this->nomeDoBanco  = $nomeBanco;
  $this->nomeDaTabela = $nomeTabela;
  }

 //método que inicia a comunicação entre o nosso código em PHP e o servidor de banco de dados
 function criarConexao()
  {
   $conexao = new mysqli($this->servidor, $this->usuario, $this->senha) or exit($conexao->error); 

   return $conexao;
  }

 //vamos implementar, agora, o método que cria o banco de dados no servidor
 function criarBanco($conexao)
  {
  $sql = "CREATE DATABASE IF NOT EXISTS $this->nomeDoBanco";
  $conexao->query($sql) or exit($conexao->error);
  }

 }