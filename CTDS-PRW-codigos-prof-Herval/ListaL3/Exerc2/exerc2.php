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
  $alunos[$matric1] = [$aluno1, $media1];
  $alunos[$matric2] = [$aluno2, $media2];
  $alunos[$matric3] = [$aluno3, $media3];

  //item b) calcular a média geral da turma em PRW e mostrar o resultado. Para isso, criamos um vetor auxiliar somente com as médias de cada aluno. Em seguida, usamos a funão de soma neste vetor e calculamos a média geral
  foreach($alunos as $matric => $vetorInterno)
   {
   $vetorAuxiliar[] = $vetorInterno[1];
   }

  $media = array_sum($vetorAuxiliar) / count($vetorAuxiliar);
  $mediaFormatada = number_format($media, 1, ",", ".");

  echo "<p> Caro professor, de acordo com os dados dos alunos cadastrados na matriz, a média final geral da turma em PRW é igual a <span> $mediaFormatada </span> </p>";
 ?>  
</body> 
</html> 
