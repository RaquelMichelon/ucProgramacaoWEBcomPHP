<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Dados cadastrais de alunos com matrizes em PHP </h1>
 <form action="exerc5.php" method="post">
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
   
   <button name="enviar-dados"> Cadastrar e ordenar os dados dos alunos pela média individual </button>
  </fieldset>
 </form> 
 
 <?php
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

    /*Se eu precisar ordenar uma matriz pelo índice (no nosso caso, pelo número de matrícula), não há nenhuma dificuldade. Basta usar a função adequada que já utilizamos para vetores

    krsort($alunos);
    echo "<pre>";
    print_r($alunos);
    echo "</pre>";*/

 
    //item b) Para facilitar a ordenação dos dados de cada aluno, tomand-se como base a sua média individual em PRW, criamos um vetor auxiliar só com as médias, usando o número de matrícula como índice. A seguir, ordenamos os dados deste vetor auxiliar e, finalmente, vamos até a matriz buscar o dado faltante
    foreach($alunos as $matric => $vetorInterno)
      {
      $vetorAuxiliar[$matric] = $vetorInterno[1];
      }


    //agora, vamos ordenar o vetor auxiliar
    arsort($vetorAuxiliar);

    //criamos o cabeçalho da tabela na página web
    echo "<table>
            <caption> Dados dos alunos oredenados decrescentemente pela média individual em PRW </caption>
            <tr>
             <th> Média do aluno </th>
             <th> Matrícula </th>
             <th> Aluno </th>            
            </tr>";

    //com o laço foreach, percorremos o vetor auxiliar já ordenado
    foreach($vetorAuxiliar as $matric => $media)
     {
     $nome = $alunos[$matric][0];

     $mediaFormatada = number_format($media, 1, ",", ".");

     echo "<tr>
            <td> $mediaFormatada </td>
            <td> $matric </td>
            <td> $nome </td>
           </tr>";
     }
    echo "</table>";
    }
  ?>  
</body> 
</html> 