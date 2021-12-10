<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="./css/formata-formulario.css">
</head> 

<body> 
 <h1> Fundamentos do PHP com MySQL - processamento de dados de alunos </h1>
 <form action="exerc1.php" method="post">
  <fieldset>
   <legend> Dados cadastrais do aluno na UC Programação Web, do CTDS </legend>

   <label class="alinha"> Forneça o nome do aluno: </label>
   <input type="text" name="aluno" autofocus>   <br>

   <label class="alinha"> Forneça a matrícula do aluno: </label>
   <input type="text" name="matricula">   <br>

   <label class="alinha"> Forneça a média final em PRW: </label>
   <input type="number" name="media" min="0" max="10" step="0.1">  <br>

   <button name="cadastrar"> Cadastrar informações no banco de dados </button>
  </fieldset>

  <fieldset>
    <legend> Outras operações sobre o banco de dados </legend>
    <button name="outras-operacoes"> Outras operações sobre o banco de dados </button>
  </fieldset>
 </form> 
  <?php 
   //devemos, antes de mais nada, chamar as includes que: a)fazem a conexão do nosso código com o banco de dados e b)representa o aluno como um objeto a ser utilizado posteriormente 
   $includeClasseAluno        = "./includes/criar-classe-aluno.inc.php";
   $includeClasseBancoDeDados = "./includes/criar-classe-banco.inc.php";
   require_once $includeClasseAluno;
   require_once $includeClasseBancoDeDados;   

   //criando o objeto Banco de Dados
   $banco = new BancoDeDados("localhost", "root", "", "CTDS", "alunos");

   /*visualizando o conteúdo de um objeto no PHP
   var_dump($banco);*/

   //vamos criar o objeto conexão, estabelecendo a comunicação entre o PHP e o MySQL
   $conexao = $banco->criarConexao();

   //o próximo passo é criar o banco de dados, se ele ainda não existir, por meio do método do objeto banco
   $banco->criarBanco($conexao); 

   //o próximo passo é abrir o banco de dados
   $banco->abrirBanco($conexao);

   //agora, definimos o utf-8 como o conjunto padrão de símbolos do banco de dados
   $banco->definirCharset($conexao);

   //finalmente, no banco, invocamos o método para criar a tabela
   $banco->criarTabela($conexao);
   
   //neste ponto do script principal, vamos criar o nosso objeto aluno
   $aluno = new Alunos();

   //neste momento, testamos se o botão de cadastro foi acionado no formulário
   if(isset($_POST["cadastrar"]))
    {
    //invocar o método que recebe os dados do aluno do formulário
    $aluno->receberDados($conexao);
    $aluno->cadastrar($conexao, $banco->nomeDaTabela);

    echo "<p> Dados do aluno cadastrados com sucesso na base de dados. </p>";
    }

   //testamos o segundo botão do formulário e implementamos as operações do item b) e c)
   if(isset($_POST["outras-operacoes"]))
    {
    //invocamos o método da classe Alunos que tabula os dados oriundos do banco de dados
    $aluno->tabularDados($conexao, $banco->nomeDaTabela);

    //invocamos o método que recebe o número de alunos aprovados por meio do método contarAprovados, da classe Alunos
    $numeroAprovados = $aluno->contarAprovados($conexao, $banco->nomeDaTabela);
    echo "<p> Caro professor, de acordo com os dados cadastrais dos alunos na base de dados, o número de alunos aprovados na UC Programação Web é igual a <span> $numeroAprovados aluno(s) </span> </p>";
    }

  //finalmente, antes de terminarmos o código, encerramos a conexão com o banco de dados
  $banco->desconectar($conexao);   
  ?>    
</body> 
</html> 