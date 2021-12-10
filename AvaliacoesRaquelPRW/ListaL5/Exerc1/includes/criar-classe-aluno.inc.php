<?php
 //agora, vamos criar a classe Alunos. Esta classe contém os métodos e atributos necessários ao PHP para, interagindo com o banco de dados, poder executar as operações identificadas como requisitos funcionais da nossa aplicação

 class Alunos
  {
  public $matricula;
  public $nome;
  public $mediaFinal;

  //implementar o método de recebimento dos dados do aluno a partir do formulário
  function receberDados($conexao)
   {
   //atenção, pessoal, para os comandos do PHP que evitam o tipo de ataque ao servidor conhecido como injeção de SQL
   $matricula = $_POST['matricula'];
   $nome      = $_POST['aluno'];
   $media     = $_POST['media'];

   //remover os espaços em branco digitados pelo usuário em qualquer caixa textual 
   $matricula = trim($matricula);
   $nome      = trim($nome);
   $media     = trim($media);

   //usando os comandos de sanitização do PHP para evitarmos injeção de SQL
   $matricula = $conexao->escape_string($matricula);
   $nome      = $conexao->escape_string($nome);
   $media     = $conexao->escape_string($media);

   //atribuir os dados do formulário aos atributos da classe Aluno
   $this->matricula  = $matricula;
   $this->nome       = $nome;
   $this->mediaFinal = $media;
   }

  //criar o método de cadastro dos dados no banco de dados
  function cadastrar($conexao, $nomeDaTabela)
   {
   $sql = "INSERT $nomeDaTabela VALUES(
             '$this->matricula',
             '$this->nome',
             $this->mediaFinal)";   

   $conexao->query($sql) or die($conexao->error);
   }

  function tabularDados($conexao, $nomeDaTabela)
   {
   $sql = "SELECT * FROM $nomeDaTabela";
   $resultado = $conexao->query($sql) or die($conexao->error);

   //criando o cabeçalho da tabela na página web
   echo "<table>
          <caption> Dados de todos os alunos cadastrados </cpation>
          <tr>
           <th> Matrícula </th>
           <th> Aluno </th>
           <th> Média em PRW </th>
          </tr>";

   //agora, devemos criar um laço de repetição que fará o PHP buscar cada uma das linhas de dado (registro) retornadas pela consulta SELECT e que estão dentro do objeto $resultado
   While($registro = $resultado->fetch_array())
    {
    //antes de acessarmos qualquer dado oriundo de uma consulta SELECT e enviarmos isto ao navegador, devemos utilizar os comandos do PHP que previnem ataques do tipo XSS
    $matricula = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
    $aluno     = htmlentities($registro[1], ENT_QUOTES, "UTF-8");
    $media     = htmlentities($registro[2], ENT_QUOTES, "UTF-8");

    echo "<tr>
           <td> $matricula </td>
           <td> $aluno </td>
           <td> $media </td>
          </tr>";
    }
   echo "</table>";   
   }

  //método que conta o número de alunos aprovados
  function contarAprovados($conexao, $nomeDaTabela)
   {
   $sql = "SELECT COUNT(*) FROM $nomeDaTabela WHERE media >= 6";
   $resultado = $conexao->query($sql) or die($conexao->error);

   //acessamos o objeto $resultado, recuperamos o número de alunos aprovados, por meio do método fetch_array, e inserimos este valor no vetor $registro
   $registro = $resultado->fetch_array();

   $numeroAprovados = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
   return $numeroAprovados;
   }
  }