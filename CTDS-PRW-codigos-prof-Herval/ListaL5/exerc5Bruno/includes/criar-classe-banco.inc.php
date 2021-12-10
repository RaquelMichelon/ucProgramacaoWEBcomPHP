<?php  
    class BancoDeDados
    {
        public $nomeDoBanco;
        public $nomeDaTabela;
        public $servidor;
        public $usuario;
        public $senha;

        // Criando método construtor personalizado(__construct) da classe:
        function __construct($servidorBanco, $usuarioBanco, $senhaBanco, $nomeBanco, $nomeTabela) // Essas informações vêm do script principal e transferem os valores aos atributos da classe.
        {
            $this->servidor            = $servidorBanco;
            $this->usuario             = $usuarioBanco;
            $this->senha               = $senhaBanco;
            $this->nomeDoBanco         = $nomeBanco;
            $this->nomeDaTabela        = $nomeTabela;
        }

        // Método que inicia a comunicação entre o nosso código em PHP e o servidor de banco de dados MySQL:
        function criarConexao()
        {
            $conexao = new mysqli($this->servidor, $this->usuario, $this->senha) or exit($conexao->error);
            return $conexao;
        }

        // Método que irá criar (fisicamente) o banco de dados no servidor:
        function criarBanco($conexao)
        {
            $sql = "CREATE DATABASE IF NOT EXISTS $this->nomeDoBanco";
            $conexao->query($sql);
        }

        // Método para acessar o banco de dados a ser utilizada (CTDS):
        function abrirBanco($conexao)
        {
            $conexao->select_db($this->nomeDoBanco);
            // ou:
            //$sql = "USE $this->nomeDoBanco";
            //$conexao->query($sql) or exit($conexao->error);
        }

        // Método para definirmos no banco de dados o mesmo conjunto de símbolos/caracteres usados, tanto pelo PHP quanto pelo navegador, ao renderizar o conteúdo na página Web.
        function definirCharset($conexao)
        {
            $conexao->set_charset("utf8");
        }

        // Método para criar tabelas:
        function criarTabela($conexao)
        {
            $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela
                (
                    id VARCHAR(20) PRIMARY KEY,
                    orcamento DECIMAL (9,2),
                    inicio DATE,
                    tempo INT
                )";
            $conexao->query($sql) or exit($conexao->error);
        }

        // Método para encerrar conexão com o banco de dados:
        function desconectar($conexao)
        {
            $conexao->close();
        }
    }

?>