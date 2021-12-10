<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Dados cadastrais de alunos com matrizes em PHP </h1>
 <form action="exerc3.php" method="post">
  <fieldset>
   <legend> Dados cadastrais do aluno 1 </legend>
   <label class="alinha"> Nome do aluno 1: </label>
   <input type="text" name="nome1" autofocus placeholder="Nome do aluno..."> <br>

   <label class="alinha"> Matrícula do aluno 1: </label>
   <input type="text" name="matric1"> <br>

   <label class="alinha"> Média final do aluno 1: </label>
   <input type="number" name="media1" step="0.1" min="0" max="10"> 
  </fieldset>

  <fieldset>
    <legend> Dados cadastrais do aluno 2 </legend>
    <label class="alinha"> Nome do aluno 2: </label>
    <input type="text" name="nome2" placeholder="Nome do aluno..."> <br>
 
    <label class="alinha"> Matrícula do aluno 2: </label>
    <input type="text" name="matric2"> <br>
 
    <label class="alinha"> Média final do aluno 2: </label>
    <input type="number" name="media2" step="0.1" min="0" max="10"> 
   </fieldset>
   
   <fieldset>
    <legend> Dados cadastrais do aluno 3 </legend>
    <label class="alinha"> Nome do aluno 3: </label>
    <input type="text" name="nome3" placeholder="Nome do aluno..."> <br>
 
    <label class="alinha"> Matrícula do aluno 3: </label>
    <input type="text" name="matric3"> <br>
 
    <label class="alinha"> Média final do aluno 3: </label>
    <input type="number" name="media3" step="0.1" min="0" max="10"> 
   </fieldset>   
   
   <button name="enviar-dados"> Cadastrar e mostrar dados do aluno com maior média </button>
  </fieldset>
 </form> 
 
 <?php
   //aqui, colocamos todos os comandos em PHP que irão receber os dados do formulário, efetuar o processamento e enviar ESTA página web de volta para o usuário da nossa aplicação. Antes disso, devemos testar se o usuário acionou o botão submit no formulário

   if(isset($_POST["enviar-dados"]))
    {
    $aluno1 = $_POST['nome1'];
    $aluno2 = $_POST['nome2'];
    $aluno3 = $_POST['nome3'];
 
    $media1  = $_POST['media1'];
    $media2  = $_POST['media2'];
    $media3  = $_POST['media3'];
 
    $matric1  = $_POST['matric1'];
    $matric2  = $_POST['matric2'];
    $matric3  = $_POST['matric3'];

    $alunos[$matric1] = [$aluno1, $media1];
    $alunos[$matric2] = [$aluno2, $media2];
    $alunos[$matric3] = [$aluno3, $media3];
 
    //item b) Descobrir os dados do aluno que tem a maior média da turma e moestrar estas informações na página web. Para isso, criamos um vetor auxiliar somente com as médias de cada aluno, usando a matrícula como índice associativo. Em seguida, usamos a função max para buscar, no vetor temporário, a maior média. E, após isso, usamos a função array_search()
    foreach($alunos as $matric => $vetorInterno)
      {
      $vetorAuxiliar[$matric] = $vetorInterno[1];
      }

    //descobrindo a maior média
    $maiorMedia = max($vetorAuxiliar);

    //descobrindo o número de matrícula do aluno com a maior média
    $matricComMaiorMedia = array_search($maiorMedia, $vetorAuxiliar);

    //descobrindo o nome do aluno que está associado à maior média
    $nomeAlunoMaiorMedia = $alunos[$matricComMaiorMedia][0];

    $media = array_sum($vetorAuxiliar) / count($vetorAuxiliar);
    $maiorMediaFormatada = number_format($maiorMedia, 1, ",", ".");
 
    echo "<p> Caro professor, de acordo com os dados dos alunos cadastrados na matriz, os dados do aluno de maior rendimento em PRW são os seguintes: <br>
         Nome do aluno = <span> $nomeAlunoMaiorMedia </span> <br>
         Matrícula do aluno = <span> $matricComMaiorMedia </span>  <br>
         Maior média encontrada = <span> $maiorMediaFormatada </span> </p>";
    }
  ?>
  
</body> 
</html> 