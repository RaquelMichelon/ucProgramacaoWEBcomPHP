<?php
 class Medicos
  {
  public $crm;
  public $nome;

  function receberDados($conexao)
   {
   $crm       = $conexao->escape_string(trim($_POST['crm']));
   $nome      = $conexao->escape_string(trim($_POST['nome-medico']));
 
   $this->crm      = $crm;
   $this->nome     = $nome;
   }

  function cadastrar($conexao, $nomeDaTabela1)
   {
   $sql = "INSERT $nomeDaTabela1 VALUES(
             '$this->crm',
             '$this->nome'
             )";   

   $conexao->query($sql) or die($conexao->error);
   }

  function alterarDados($conexao, $nomeDaTabela)
   {
   //recebendo os dados de pesquisa do produto oriundos do formulário
   $id        = $conexao->escape_string(trim($_POST['pesquisa-id']));
   $novoPreco = $conexao->escape_string(trim($_POST["novo-preco"]));

   $sql = "UPDATE $nomeDaTabela SET preco=$novoPreco WHERE id='$id'";
   $conexao->query($sql) or die($conexao->error);

   //nós podemos testar, via PHP, se a alteração do preço unitário do produto foi efetuada com sucesso (ou não) no banco de dados, por meio do comando abaixo:
   $numeroRegistrosAfetados = $conexao->affected_rows;

   if($numeroRegistrosAfetados == 0)
    {
    echo "<p> Atenção: o id do produto <span> ($id) </span> fornecido não foi encontrado em nossa base de dados. Verifique e tente novamente. </p>";
    }
  
   else 
    {
    echo "<p> Operação de alteração do preço unitário do produto efetivada com sucesso na base de dados. </p>";
    }
   }

  function mostrarDescricao($conexao, $nomeDaTabela)
   {
   $sql = "SELECT descricao FROM $nomeDaTabela WHERE estoque = (     SELECT MIN(estoque) FROM $nomeDaTabela)";
   $resultado = $conexao->query($sql) or die($conexao->error);

   $registro = $resultado->fetch_array();

   $descricao = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
   return $descricao;
   }

  function calcularFaturamento($conexao, $nomeDaTabela)
   {
   $sql = "SELECT SUM(estoque * preco) FROM $nomeDaTabela WHERE classificacao = 'Produto não-perecível'";
   $resultado = $conexao->query($sql) or die($conexao->error);

   $registro = $resultado->fetch_array();

   $faturamento = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
   return $faturamento;
   }
  }