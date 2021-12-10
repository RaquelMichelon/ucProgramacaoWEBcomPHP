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
  $aluno1 = $_POST['nome1'];
  $aluno2 = $_POST['nome2'];
  $aluno3 = $_POST['nome3'];

  $nota1  = $_POST['nota1'];
  $nota2  = $_POST['nota2'];
  $nota3  = $_POST['nota3'];

  $alunos = [$aluno1 => $nota1,
             $aluno2 => $nota2,
             $aluno3 => $nota3];

  //b)vamos ordenar o vetor, decrescentemente, pelo valor da nota
  arsort($alunos);

  //item c) mostrar os dados ordenados na página web, por meio de uma tabela
  echo "<table>
         <caption> Dados dos alunos cadastrados no vetor (CTDS-PRW) </caption>
         <tr>
          <th> Nome do aluno </th>
          <th> Nota do aluno </th>
         </tr>";

  foreach($alunos as $nome => $nota)
   {
   echo "<tr>
          <td> $nome  </td>
          <td> $nota </td>
         </tr>";   
   }
  echo "</table>"; 
 ?>  
</body> 
</html> 
