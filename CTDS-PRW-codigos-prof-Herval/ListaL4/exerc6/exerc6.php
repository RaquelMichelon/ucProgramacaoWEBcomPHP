<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Validação de idade do usuário com funções e includes em PHP </h1>
 <form action="exerc6.php" method="post">
  <fieldset>
   <legend> Verificação da idade do usuário </legend>

   <label> Forneça a idade do usuário: </label>
   <input type="number" name="idade" min="0">   

   <button name="enviar-dados"> Verificar idade e disponibilidade de voto </button>
  </fieldset>
 </form> 
  <?php   
   //================script principal==================================
   //inserindo a chamado do arquivo externo exercicio6.inc.php
   $nomeDaInclude = "exercicio6.inc.php";
   require_once $nomeDaInclude;

   if(isset($_POST['enviar-dados']))
    {
    $idade = $_POST["idade"];

    //item a) invocar a função que testa se a idade é válida
    $idadeValidada = validarIdade($idade);

    //item b) invocar uma função que testa se o usuário está apto (ou não) a votar
    testarVoto($idadeValidada);    



    }
  ?>
  
</body> 
</html> 