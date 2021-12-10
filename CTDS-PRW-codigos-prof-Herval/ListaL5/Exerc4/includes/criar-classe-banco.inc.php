<?php
 class BancoDeDados
  {
  public $nomeDoBanco;
  public $nomeDaTabela1; 
  public $nomeDaTabela2;
  public $servidor;
  public $usuario;
  public $senha;  
  

 function __construct($servidorBanco, $usuarioBanco, $senhaBanco, $nomeBanco, $nomeTabela1, $nomeTabela2) 
  {
  $this->servidor = $servidorBanco;
  $this->usuario  = $usuarioBanco;
  $this->senha    = $senhaBanco;
  $this->nomeDoBanco  = $nomeBanco;
  $this->nomeDaTabela1 = $nomeTabela1;
  $this->nomeDaTabela2 = $nomeTabela2;
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

 function criarTabela1($conexao)
  {
  //criação da tabela médicos
  $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela1 (
                crm VARCHAR(20) PRIMARY KEY,
                nome VARCHAR(500)
                ) ENGINE=innoDB";
  $conexao->query($sql) or exit($conexao->error);
  }

 function criarTabela2($conexao)
  {
  //criação da tabela pacientes
  $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela2(
           id INT PRIMARY KEY AUTO_INCREMENT,
           nome VARCHAR(300),
           data_internacao DATE,
           crm_medico VARCHAR(20),
           FOREIGN KEY(crm_medico) REFERENCES $this->nomeDaTabela1(crm)) ENGINE=innoDB";
  $conexao->query($sql) or exit($conexao->error);
  }

 function desconectar($conexao)
  {
  $conexao->close();
  }
 }