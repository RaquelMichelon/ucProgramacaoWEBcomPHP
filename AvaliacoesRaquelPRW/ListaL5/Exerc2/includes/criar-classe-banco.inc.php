<?php
 class BancoDeDados
  {
  public $nomeDoBanco;
  public $nomeDaTabela; 
  public $servidor;
  public $usuario;
  public $senha;  
  

 function __construct($servidorBanco, $usuarioBanco, $senhaBanco, $nomeBanco, $nomeTabela) 
  {
  $this->servidor = $servidorBanco;
  $this->usuario  = $usuarioBanco;
  $this->senha    = $senhaBanco;
  $this->nomeDoBanco  = $nomeBanco;
  $this->nomeDaTabela = $nomeTabela;
  }

 function criarConexao()
  {
   $conexao = new mysqli($this->servidor, $this->usuario, $this->senha) or exit($conexao->error); 

   return $conexao;
  }


 function criarBanco($conexao)
  {
  $sql = "CREATE DATABASE IF NOT EXISTS $this->nomeDoBanco";
  $conexao->query($sql) or exit($conexao->error);
  }

 function abrirBanco($conexao)
  {
  $conexao->select_db($this->nomeDoBanco); 
  }

 function definirCharset($conexao)
  {
  $conexao->set_charset("utf8"); 
  }

 //o único método a ser modificado, na importação desta classe do exercício 1 para este exercício, que é o 2, é este aqui
 function criarTabela($conexao)
  {
  $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela (
                id VARCHAR(20) PRIMARY KEY,
                preco DECIMAL(6, 2),
                estoque INT UNSIGNED,
                classificacao VARCHAR(50),
                descricao VARCHAR(500)
                )";
  $conexao->query($sql) or exit($conexao->error);
  }

 function desconectar($conexao)
  {
  $conexao->close();
  }
 }