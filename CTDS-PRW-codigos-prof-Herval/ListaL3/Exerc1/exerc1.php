<!DOCTYPE html> 
<html lang="pt-BR"> 
 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Armazenamento de dados com matrizes em PHP </h1>
 <?php
  $aluno1 = $_POST['nome1'];
  $aluno2 = $_POST['nome2'];
  $aluno3 = $_POST['nome3'];

  $media1  = $_POST['media1'];
  $media2  = $_POST['media2'];
  $media3  = $_POST['media3'];

  $matric1  = $_POST['matric1'];
  $matric2  = $_POST['matric2'];
  $matric3  = $_POST['matric3'];

  //item a) cadastro dos dados na matriz, usando a matrícula como índice mais externo (I)
  $alunos[$matric1][0] = $aluno1;
  $alunos[$matric1][1] = $media1;

  $alunos[$matric2][0] = $aluno2;
  $alunos[$matric2][1] = $media2;

  $alunos[$matric3][0] = $aluno3;
  $alunos[$matric3][1] = $media3;

  //outra forma
  $alunos[$matric1] = [$aluno1, $media1];
  $alunos[$matric2] = [$aluno2, $media2];
  $alunos[$matric3] = [$aluno3, $media3];

  //outra forma
  $alunos = [$matric1 => [$aluno1, $media1],
             $matric2 => [$aluno2, $media2],
             $matric3 => [$aluno3, $media3]]; 

  /*echo "<pre>";
  print_r($alunos);
  echo "</pre>";*/


  //item b) mostrar os dados da matriz, por meio de uma tabela na página web
  echo "<table>
         <caption> Dados dos alunos cadastrados na matriz (CTDS-PRW) </caption>
         <tr>
          <th> Matrícula </th>
          <th> Aluno </th>
          <th> Média final em PRW </th>
         </tr>";

  foreach($alunos as $matric => $vetorInterno)
   {
   $media = $vetorInterno[1];
   $mediaFormatada = number_format($media, 1, ",", ".");
   echo "<tr>
          <td> $matric </td>
          <td> $vetorInterno[0] </td>
          <td> $mediaFormatada </td>
         </tr>";   
   }
  echo "</table>"; 
 ?>  
</body> 
</html> 
