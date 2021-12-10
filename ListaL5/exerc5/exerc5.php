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
    <button name="outras-operacoes"> Cadastrar informações no banco de dados </button>
  </fieldset>
 </form> 
  <?php 
   //devemos, antes de mais nada, chamar as includes que: a)fazem a conexão do nosso código com o banco de dados e b)representa o aluno como um objeto a ser utilizado posteriormente 
   $includeClasseAluno        = "./includes/criar-classe-aluno.inc.php";
   $includeClasseBancoDeDados = "./includes/criar-classe-banco.inc.php";
   //require_once $includeClasseAluno;
   require_once $includeClasseBancoDeDados;   

   //criando o objeto Banco de Dados
   $banco = new BancoDeDados("localhost", "root", "", "CTDS", "alunos");

   /*visualizando o conteúdo de um objeto no PHP
   var_dump($banco);*/

   //vamos criar o objeto conexão, estabelecendo a comunicação entre o PHP e o MySQL
   $conexao = $banco->criarConexao();

   //o próximo passo é criar o banco de dados, se ele ainda não existir, por meio do método do objeto banco
   $banco->criarBanco($conexao);  



   
  ?>    
</body> 
</html> 