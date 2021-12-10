<?php
 class BancoDeDados {
    public $nomeDoBanco;
    public $nomeDaTabela; 
    public $servidor;
    public $usuario;
    public $senha;  
  

 function __construct($servidorBanco, $usuarioBanco, $senhaBanco, $nomeBanco, $nomeTabela) {
    $this->servidor     = $servidorBanco;
    $this->usuario      = $usuarioBanco;
    $this->senha        = $senhaBanco;
    $this->nomeDoBanco  = $nomeBanco;
    $this->nomeDaTabela = $nomeTabela;
  }

 function criarConexao() {
    $conexao = new mysqli($this->servidor, $this->usuario, $this->senha) or exit($conexao->error); 
    return $conexao;
  }

 function criarBanco($conexao) {
    $sql = "CREATE DATABASE IF NOT EXISTS $this->nomeDoBanco";
    $conexao->query($sql) or exit($conexao->error);
  }

 function abrirBanco($conexao) {
    $conexao->select_db($this->nomeDoBanco); 
  }

 function definirCharset($conexao) {
    $conexao->set_charset("utf8"); 
  }

 function criarTabela($conexao) {
    $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela (
                id VARCHAR(20) PRIMARY KEY,
                orcamento DECIMAL (9, 2),
                inicio DATE, 
                horas INT UNSIGNED
                )";
    $conexao->query($sql) or exit($conexao->error);
  }

 function desconectar($conexao) {
    $conexao->close();
  } 
}