<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Conversão de temperaturas em PHP, por meio de includes e funções de usuário </h1>
 <form action="exerc7.php" method="post">
  <fieldset>
   <legend> Converter temperaturas </legend>

   <label> Forneça a temperatura a ser convertida: </label>
   <input type="number" name="temp" step="0.01">   <br> <br>

   <label> Escolha a escala termométrica a ser utilizada: </label> <br>
   <input type="radio" name="escala" value="CparaF"> Converter da escala Celsius para a escala Fahrenheit <br>
   <input type="radio" name="escala" value="FparaC"> Converter da escala Fahrenheit para a escala Celsius <br>

   <button name="enviar-dados"> Converter temperatura </button>
  </fieldset>
 </form> 
  <?php   
   //=====================script principal==============================
   $nomeDaInclude = "exercicio7.inc.php";
   require_once $nomeDaInclude;

   if(isset($_POST["enviar-dados"]))
    {
    //recebendo o valor da temperatura a se convertida
    $temp = $_POST['temp'];

    //testando os botões de rádio
    if(isset($_POST['escala']))
     {
     //um botão foi selecionado 
     $escalaEscolhida = $_POST['escala'];

     //testando qual escala foi selecionada pelo usuário
     if($escalaEscolhida == "CparaF")
      {
      converterDeCparaF($temp);
      }
     else
      {
      converterDeFparaC($temp);
      }
     }
    else
     {
     exit("<p> Você deve escolher a escala termométrica para a conversão. Tente novamente! </p>");
     }    
    }   
  ?>  
</body> 
</html> 