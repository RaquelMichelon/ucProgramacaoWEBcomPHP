<?php
 class Produtos
  {
  public $id;
  public $preco;
  public $estoque;

  function receberDados($conexao)
   {
   $id        = $_POST['id'];
   $preco     = $_POST['preco'];
   $estoque   = $_POST['quantidade-estoque'];

   $id        = trim($id);
   $preco     = trim($preco);
   $estoque   = trim($estoque);
 
   $id        = $conexao->escape_string($id);
   $preco     = $conexao->escape_string($preco);
   $estoque   = $conexao->escape_string($estoque);

   //atribuir os dados do formulário aos atributos da classe Aluno
   $this->id            = $id;
   $this->preco         = $preco;
   $this->estoque       = $estoque;
   }


  function cadastrar($conexao, $nomeDaTabela)
   {
   $sql = "INSERT $nomeDaTabela VALUES(
             '$this->id',
             $this->preco,
             $this->estoque
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

  function excluirProdutos($conexao, $nomeDaTabela)
   {
   $estoqueMinimo = $conexao->escape_string(trim($_POST['estoque-minimo']));

   $sql = "DELETE FROM $nomeDaTabela WHERE estoque < $estoqueMinimo";

   $conexao->query($sql) or die($conexao->error); 
   
   $numeroRegistrosAfetados = $conexao->affected_rows;

   if($numeroRegistrosAfetados == 0)
    {
    echo "<p> Atenção: nenhum produto foi excluído da base de dados, pois todos eles apresentam estoque mínimo igual ou superior a <span> $estoqueMinimo </span> unidades. </p>";
    }
  
   else 
    {
    echo "<p> Caro usuário, de acordo com o estoque mínimo fornecido, que é de <span> $estoqueMinimo </span> unidades, um total de <span> $numeroRegistrosAfetados </span> produtos foram excluídos da base de dados. </p>";
    }
   } 
  }