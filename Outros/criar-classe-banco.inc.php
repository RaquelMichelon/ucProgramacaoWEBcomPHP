<?php
class BancoDeDados {
    public $nomeDoBanco;
    public $nomeDaTabela; //se precisar usar mais de uma tabela, criar um atributo para cada 
    public $servidor; //por enquanto eh o servidor local localhost
    public $usuario; 
    public $senha;

    function __construct($servidorBanco, $usuarioBanco, $senhaBanco, $nomeBanco, $nomeTabela) {
        $this->servidor = $servidorBanco;
        $this->usuario = $usuarioBanco;
        $this->senha = $senhaBanco;
        $this->nomeDoBanco = $nomeBanco;
        $this->nomeDaTabela = $nomeTabela;

    }

    function criarConexao() { //usar classe pronta mysqli
        $conexao = new mysqli($this->servidor, $this->usuario, $this->senha) or exit($conexao->error);

        return $conexao;
    }

    function criarBanco($conexao) {
        $sql = "CREATE DATABASE IF NOT EXISTS $this->nomeDoBanco";
        $conexao->query($sql) or exit($conexao->error);
    }

    function abrirBanco($conexao) {
        $conexao->select_db($this->nomeDoBanco); //metodo especifico do mysqli
    }
}

