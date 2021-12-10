<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="./css/formata-formulario.css">
</head> 

<body> 
 <h1> Fundamentos do PHP com MySQL - processamento de produtos </h1>
 <form action="exerc2.php" method="post">
  <fieldset>
   <legend> Dados cadastrais de cada produto </legend>

   <label class="alinha"> Forneça o ID do produto: </label>
   <input type="text" name="id" autofocus>   <br>

   <label class="alinha"> Forneça o preço unitário do produto: </label>
   <input type="number" name="preco" step="0.01" min="0">   <br>

   <label class="alinha"> Forneça quantidade em estoque do produto: </label>
   <input type="number" name="estoque" min="0">  <br>

   <label class="alinha"> Selecione a classificação do produto: </label>
   <select name="classificacao">
    <option> Produto perecível </option>
    <option> Produto não-perecível </option>
   </select> <br> <br>

   <label class="alinha "> Forneça a descrição do produto: </label>
   <textarea name="descricao"></textarea> <br>

   <button name="cadastrar"> Cadastrar informações no banco de dados </button>
  </fieldset>

  <fieldset>
    <legend> Outras operações sobre o banco de dados </legend>
    <button name="mostrar-pereciveis"> Mostrar dados dos produtos perecíveis </button> 

    <button name="mostrar-descricao"> Mostrar descrição do produto com menor estoque </button> 

    <button name="mostrar-faturamento"> Mostrar faturamento com venda de todos os não-perecíveis </button>
  </fieldset>
 </form> 
  <?php 
   $includeClasseProduto      = "./includes/criar-classe-produto.inc.php";
   $includeClasseBancoDeDados = "./includes/criar-classe-banco.inc.php";
   require_once $includeClasseProduto;
   require_once $includeClasseBancoDeDados;   

   $banco = new BancoDeDados("localhost", "root", "", "CTDS", "produtos");

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

 
   if(isset($_POST["mostrar-pereciveis"]))
    {
    $produto->tabularDados($conexao, $banco->nomeDaTabela);
    }

  if(isset($_POST["mostrar-descricao"]))
   {
   $descricaoMenorestoque = $produto->mostrarDescricao($conexao, $banco->nomeDaTabela); 
   echo "<p> Caro usuário, a descrição do produto com a menor quantidade em estoque é: <span> $descricaoMenorestoque </span> </p>"; 
   }

  if(isset($_POST["mostrar-faturamento"]))
   {
   $faturamento = $produto->calcularFaturamento($conexao, $banco->nomeDaTabela);

   $faturamentoFormatado = number_format($faturamento, 2, ",", ".");
   echo "<p> Caro usuário, de acordo com os dados cadastrados em nossa base de dados, o faturamento total obtido com as venda de todos os produtos não-perecíveis em estoque, é de <span> R$$faturamentoFormatado </span> </p>";
   }
  $banco->desconectar($conexao);   
  ?>    
</body> 
</html> 