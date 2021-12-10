<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="./css/formata-formulario.css">
</head> 

<body> 
 <h1> Fundamentos do PHP com MySQL - processamento de produtos </h1>
 <form action="exerc3.php" method="post">
  <fieldset>
   <legend> Dados cadastrais de cada produto </legend>

   <label class="alinha"> Forneça o ID do produto: </label>
   <input type="text" name="id" autofocus>   <br>

   <label class="alinha"> Forneça o preço unitário do produto: </label>
   <input type="number" name="preco" step="0.01" min="0">   <br>

   <label class="alinha"> Forneça quantidade em estoque do produto: </label>
   <input type="number" name="quantidade-estoque" min="0">   <br>
   
   <button name="cadastrar"> Cadastrar informações no banco de dados </button>
  </fieldset>

  <fieldset>
    <legend> Pesquisa no banco de dados - alteração </legend>
    <label class="alinha"> Forneça o ID do produto a ser pesquisado: </label>
    <input type="text" name="pesquisa-id"> <br>

    <label class="alinha"> Forneça o novo preço unitário do produto pesquisado: </label>
    <input type="number" name="novo-preco" step="0.01" min="0"> <br>

    <button name="alterar-preco"> Efetuar alteração do preço unitário </button> 
  </fieldset>

  <fieldset>
    <legend> Pesquisa no banco de dados - exclusão </legend>

    <label class="alinha"> Forneça a quantidade mínima em estoque: </label>
    <input type="number" name="estoque-minimo" min="0"> <br>

    <button name="excluir-produtos"> Excluir produtos com estoque mínimo </button> 
  </fieldset>
 </form>

  <?php 
   $includeClasseProduto      = "./includes/criar-classe-produto.inc.php";
   $includeClasseBancoDeDados = "./includes/criar-classe-banco.inc.php";
   require_once $includeClasseProduto;
   require_once $includeClasseBancoDeDados;   

   $banco = new BancoDeDados("localhost", "root", "", "CTDS", "estoque_renovado");

   $conexao = $banco->criarConexao();

   $banco->criarBanco($conexao); 

   $banco->abrirBanco($conexao);

   $banco->definirCharset($conexao);

   $banco->criarTabela($conexao);

   $produto = new Produtos();

   if(isset($_POST["cadastrar"]))
    {
    $produto->receberDados($conexao);
    $produto->cadastrar($conexao, $banco->nomeDaTabela);

    echo "<p> Dados do produto cadastrados com sucesso na base de dados. </p>";
    }
 
   if(isset($_POST["alterar-preco"]))
    {
    $produto->alterarDados($conexao, $banco->nomeDaTabela);
    }

   if(isset($_POST["excluir-produtos"]))
    {
    $produto->excluirProdutos($conexao, $banco->nomeDaTabela);
    }
  
  $banco->desconectar($conexao);   
  ?>    
</body> 
</html> 