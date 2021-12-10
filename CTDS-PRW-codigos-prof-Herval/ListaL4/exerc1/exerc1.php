

<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Cálculo de médias com PHP </h1>
 <form action="exerc1.php" method="post">
  <fieldset>
   <legend> Notas dos aluno para cálculo da média </legend>

   <label class="alinha"> Nota 1 em PRW: </label>
   <input type="number" name="nota1" step="0.1" min="0" max="10"> <br>

   <label class="alinha"> Nota 2 em PRW: </label>
   <input type="number" name="nota2" step="0.1" min="0" max="10">   

   <button name="enviar-dados"> Calcular média aritmética simples </button>
  </fieldset>
 </form> 
  <?php

   //área de declaração das funções
   function calcularMedia($nota1, $nota2)
    {
    $mediaCalculada = ($nota1 + $nota2) / 2;
    return $mediaCalculada;
    }

   //===============================================================

   function testarMedia($media)
    {
    if($media >= 6)
     {
     echo "<p> O aluno está <span> aprovado </span>, com média final <span> $media </span> </p>";
     }
    else
     {
     echo "<p> O aluno está <span> pendente </span>, com média final <span> $media </span> </p>";
     }
    }

   //==============================================================

   if(isset($_POST['enviar-dados']))
    {
    //receber os dados do formulário - vamos chamar este bloco de comandos de script principal
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];

    //item a)
    $media = calcularMedia($nota1, $nota2);

    //item b)
    testarMedia($media);
    }
  ?>
  
</body> 
</html> 