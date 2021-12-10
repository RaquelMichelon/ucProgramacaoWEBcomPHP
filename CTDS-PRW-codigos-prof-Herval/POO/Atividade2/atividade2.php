<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Fundamentos da POO com PHP - atividade1 </h1>
  <?php   
   require_once "atividade2.inc.php"; 

   //vamos criar os objetos curso usando o construtor personalizado da classe
   $curso1 = new Curso("Curso Técnico de Desenvolvimento de Sistemas", 3);

   $curso2 = new Curso("Curso Superior de Tecnologia em Gestão da Tecnologia da Informação", 6);

   $nomeCurso1 = $curso1->mostrarNome();
   $nomeCurso2 = $curso2->mostrarNome();
   $duracaoCurso1 = $curso1->mostrarDuracao();
   $duracaoCurso2 = $curso2->mostrarDuracao();
   $classificCurso1 = $curso1->classificarCurso();
   $classificCurso2 = $curso2->classificarCurso();

   echo "<p> Resultado do processamento dos objetos Cursos cadastrados: <br>
   Nome do curso1 = $nomeCurso1 <br>
   Duração do curso1 = $duracaoCurso1 semestres <br> 
   Classificação do curso1 = $classificCurso1 <br> <br>

   Nome do curso2 = $nomeCurso2 <br>
   Duração do curso2 = $duracaoCurso2 semestres <br> 
   Classificação do curso2 = $classificCurso2 </p>";   
  ?>  
</body> 
</html> 