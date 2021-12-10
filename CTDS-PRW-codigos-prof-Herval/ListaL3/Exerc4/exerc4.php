<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Dados cadastrais de alunos com matrizes em PHP </h1>
 <form action="exerc4.php" method="post">
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

   <fieldset>
    <legend> Pesquisar dados do aluno </legend>

    <label class="alinha"> Nome do aluno pesquisado: </label>
    <input type="text" name="pesquisa-nome">    
   </fieldset>

   <button name="enviar-dados"> Cadastrar e pesquisar dados do aluno </button>  
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
 
    //item b)Antes de mais nada, vamos fazer o PHP receber o nome do aluno a ser pesquisado na matriz
    $alunoPesquisado = $_POST["pesquisa-nome"];
    
    //Vamos criar um vetor auxiliar somente com os nomes cada aluno, usando a matrícula como índice associativo. Em seguida, usamos a função array_search() para buscar o nome do aluno no vetor e retornar o número de matrículo, se o aluno foi encontrado
    foreach($alunos as $matric => $vetorInterno)
      {
      $vetorAuxiliar[$matric] = $vetorInterno[0];
      }

    //descobrindo o número de matrícula do aluno sendo pesquisado
    $matricDoAlunoPesq = array_search($alunoPesquisado, $vetorAuxiliar);

    //em seguida, mandamos o PHP testar se o aluno foi (ou não) encontrado no vetor auxiliar
    if($matricDoAlunoPesq == false)
     {
     echo "<p> Caro professor, o aluno <span> $alunoPesquisado </span> não foi encontrado em nosso cadastro. Tente novamente! </p>";
     }

    else
     {
     //entrando aqui, o PHP encontrou o aluno pesquisado no vetor auxiliar. Já temos duas informações deste aluno (nome e a matrícula). Basta, agora, irmos até a matriz, usar o número de matrícula do aluno (I) e usarmos, no vetor interno, o índice 1 (J)
     $mediaIndividual = $alunos[$matricDoAlunoPesq][1];

     $mediaIndividualFormatada = number_format($mediaIndividual, 1, ",", ".");

     echo "<p> Caro professor, de acordo com os dados dos alunos cadastrados e a busca efetuada na matriz, obtivemos os seguintes resultados: <br>
         Nome do aluno pesquisado = <span> $alunoPesquisado </span> <br>
         Matrícula do aluno pesquisado = <span> $matricDoAlunoPesq </span>  <br>
         Média individual do aluno pesquisado = <span> $mediaIndividualFormatada </span> </p>";
     }    
    }
  ?>
  
</body> 
</html> 