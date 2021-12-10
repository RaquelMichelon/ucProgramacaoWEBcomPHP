<?php
 class Produtos
  {
  public $id;
  public $preco;
  public $estoque;
  public $classificacao;
  public $descricao;

  function receberDados($conexao)
   {
   $id        = $_POST['id'];
   $preco     = $_POST['preco'];
   $estoque   = $_POST['estoque'];
   $classif   = $_POST['classificacao'];
   $descricao = $_POST['descricao'];

   $id        = trim($id);
   $preco     = trim($preco);
   $estoque   = trim($estoque);
   $classif   = trim($classif);
   $descricao = trim($descricao);

 
   $id        = $conexao->escape_string($id);
   $preco     = $conexao->escape_string($preco);
   $estoque   = $conexao->escape_string($estoque);
   $classif   = $conexao->escape_string($classif);
   $descricao = $conexao->escape_string($descricao);

   //atribuir os dados do formulário aos atributos da classe Aluno
   $this->id            = $id;
   $this->preco         = $preco;
   $this->estoque       = $estoque;
   $this->classificacao = $classif;
   $this->descricao     = $descricao;
   }


  function cadastrar($conexao, $nomeDaTabela)
   {
   $sql = "INSERT $nomeDaTabela VALUES(
             '$this->id',
             $this->preco,
             $this->estoque,
             '$this->classificacao',
             '$this->descricao')";   

   $conexao->query($sql) or die($conexao->error);
   }

  function tabularDados($conexao, $nomeDaTabela)
   {
   $sql = "SELECT * FROM $nomeDaTabela WHERE classificacao='Produto perecível' ORDER BY estoque DESC";
   $resultado = $conexao->query($sql) or die($conexao->error);

   echo "<table>
          <caption> Dados dos produtos perecíveis, em ordem decrescente de quantia em estoque </caption>
          <tr>
           <th> ID </th>
           <th> Preço </th>
           <th> Estoque </th>
           <th> Classificação </th>
           <th> descrição </th>
          </tr>";

   While($registro = $resultado->fetch_array())
    {
    $id            = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
    $preco         = htmlentities($registro[1], ENT_QUOTES, "UTF-8");
    $estoque       = htmlentities($registro[2], ENT_QUOTES, "UTF-8");
    $classificacao = htmlentities($registro[3], ENT_QUOTES, "UTF-8");
    $descricao     = htmlentities($registro[4], ENT_QUOTES, "UTF-8");

    $precoFormatado = number_format($preco, 2, ",", ".");

    echo "<tr>
           <td> $id </td>
           <td> $precoFormatado </td>
           <td> $estoque </td>
           <td> $classificacao </td>
           <td> $descricao </td>
          </tr>";
    }
   echo "</table>";   
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