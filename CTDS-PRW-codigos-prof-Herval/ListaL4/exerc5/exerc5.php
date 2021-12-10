<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Cálculo de médias com PHP </h1>
 <form action="exerc5.php" method="post">
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
   //================script principal=================================
   //mandamos o PHP incluir, nesta área, o arquivo externo (include) com a definição das funções
   include "exercicio5.inc.php";

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