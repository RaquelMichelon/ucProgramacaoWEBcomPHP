<!DOCTYPE html> 
<html lang="pt-BR"> 
 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Cálculo de médias com vetores em PHP - resposta da aplicação </h1>
 <?php
  //recebendo os dados de cada aluno e inserindo-os em variáveis simples
  $aluno1 = $_POST['nome1'];
  $aluno2 = $_POST['nome2'];
  $aluno3 = $_POST['nome3'];

  $nota1  = $_POST['nota1'];
  $nota2  = $_POST['nota2'];
  $nota3  = $_POST['nota3'];

  //item a) criar o vetor associativo com os dados das variáveis acima
  $alunos = [$aluno1 => $nota1,
             $aluno2 => $nota2,
             $aluno3 => $nota3];

  /*echo "<pre>";
  print_r($alunos);
  echo "</pre>";*/

  //item b) navegar pelo vetor com o laço especial foreach e fazer o navegador mostrar os dados de cada aluno no vetor, em uma tabela na página web

  //usando o comando echo para criar o cabeçalho de uma tabela
  echo "<table>
         <caption> Dados dos alunos cadastrados no vetor (CTDS-PRW) </caption>
         <tr>
          <th> Nome do aluno </th>
          <th> Nota do aluno </th>
         </tr>";

  foreach($alunos as $nome => $nota)
   {
   //usando o comando echo do PHP para criarmos o corpo da tabela na página web
   echo "<tr>
          <td> $nome  </td>
          <td> $nota </td>
         </tr>";   
   }
  echo "</table>"; 
  
  //item c) primeiramente, mandamos o PHP encontrar a maior nota no vetor
  $maiorNota = max($alunos);

  //agora que já conhecemos a maior nota, usamos o comando do PHP que localiza a maior nota no vetor e retorna o índice da célula que contém a maior nota. No nosso caso, é o nome do aluno que tem a maior nota
  $alunoMaiorNota = array_search($maiorNota, $alunos);

  echo "<p> Resultados da pesquisa com a maior nota: <br>
            Aluno com a maior nota = <span> $alunoMaiorNota </span> <br>
            Maior nota entre alunos = <span> $maiorNota </span> </p>";

 ?>  
</body> 
</html> 
