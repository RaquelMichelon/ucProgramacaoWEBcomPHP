<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="formata-formulario.css">
</head> 

<body> 
 <h1> Cadastro de medicamentos em uma farmácia em PHP </h1>
 <form action="exerc6.php" method="post">
  <fieldset>
   <legend> Dados cadastrais do medicamento 1 </legend>
   <label class="alinha"> Código do medicamento 1: </label>
   <input type="number" name="codigo1"> <br>
   
   <label class="alinha"> Nome do Medicamento 1: </label>
   <input type="text" name="medic1" > <br>

   <label class="alinha"> Valor do medicamento 1: </label>
   <input type="number" name="preco1" step="0.01" min="0"> 
  </fieldset><br>

  <fieldset>
   <legend> Dados cadastrais do medicamento 2 </legend>
   <label class="alinha"> Código do medicamento 2: </label>
   <input type="number" name="codigo2"> <br>
   
   <label class="alinha"> Nome do Medicamento 2: </label>
   <input type="text" name="medic2" > <br>

   <label class="alinha"> Valor do medicamento 2: </label>
   <input type="number" name="preco2" step="0.01" min="0"> 
  </fieldset><br>
   
  

  <fieldset>
   <legend> Dados cadastrais do medicamento 3 </legend>
   <label class="alinha"> Código do medicamento 3: </label>
   <input type="number" name="codigo3"> <br>
   
   <label class="alinha"> Nome do Medicamento 3: </label>
   <input type="text" name="medic3" > <br>

   <label class="alinha"> Valor do medicamento 3: </label>
   <input type="number" name="preco3" step="0.01" min="0"> 
  </fieldset><br>

  <fieldset>
     <legend> Pesquisar dados do medicamento </legend><br><br>
    <label class="alinha"> Código do medicamento pesquisado  </label> 
    <input type ="text" name="pesquisa-codigo">
   </fieldset>

  <button name="enviar-dados"> Cadastrar e pesquisar medicamentos da farmácia </button>
  </fieldset><br>
 </form> 
 
 <?php
  if(isset($_POST["enviar-dados"]))
   {
   $medicamento1 = $_POST['medic1'];
   $medicamento2 = $_POST['medic2'];
   $medicamento3 = $_POST['medic3'];

   $preco1  = $_POST['preco1'];
   $preco2  = $_POST['preco2'];
   $preco3  = $_POST['preco3'];

   $codigo1  = $_POST['codigo1'];
   $codigo2  = $_POST['codigo2'];
   $codigo3  = $_POST['codigo3'];

   $medicamentos[$codigo1] = [$medicamento1, $preco1];
   $medicamentos[$codigo2] = [$medicamento2, $preco2];
   $medicamentos[$codigo3] = [$medicamento3, $preco3];
  
    
    /*krsort($alunos);
    echo"<pre>";
    print_r($alunos);
    echo "</pre>";*/
    
    foreach($medicamentos as $codigo => $vetorInterno)
     {
     $vetorAuxiliar[$codigo] = $vetorInterno[1];
     }

    //agora, vamos ordenar o vetor auxiliar
    

    //criamos o cabeçalho da tabela na página web
    echo "<table>
              <caption> Dados dos  medicamentos em PRW <caption>
              <tr>
              <th> Preço </th>
              <th> Código </th>
              <th> Medicamento </th>
              </tr>";

    //com o laço foreach, percorremos o vetor auxiliar já ordenado
    foreach($vetorAuxiliar as $codigo => $preco)
    {
      $nome = $medicamentos[$codigo][0];
      
      $precoFormatada = number_format($preco, 2, ",", ".");

      echo "<tr>
             <td> $precoFormatada </td>
              <td> $codigo </td>
              <td> $nome </td>
             </tr>";
    }
    echo "</table>";
    
    foreach($medicamentos as $codigo => $vetorInterno)
    {
      $vetorAuxiliar[$codigo] = $vetorInterno[1];
    }
    $menorpreco = min($vetorAuxiliar);

    $codigoComMenorPreco = array_search($menorpreco,$vetorAuxiliar);
    
    $medicComMenorPreco = $medic[$codigoComMenorPreco][0];
    
    echo "<p>medicamento mais barato <span> $medicComMenorPreco </span> </P>";
   /* echo "<pre>";
     print_r($vetorAuxiliar);
     echo "</pre>";*/

     
     $codigoPesq = $_POST['pesquisa-codigo'];

     foreach($medic as $codigo => $vetorInterno)
     {
     $vetorAuxiliar[$codigo] = $codigo ;
     }
     $codigoMedicPesq = array_search($codigoPesq, $vetorAuxiliar);

     if($codigoMedicPesq == false)
     {
       echo "<p> Caro usuario, o medicamento <span> $codigoPesq</span> não foi encontrado em nosso cadastro, tente novamente! </p>";
     }
     else
     {
      $precoIndividual = $medic[$codigoMedicPesq][1];
      $medicpesq = $medic[$codigoMedicPesq][0];
      $precoIndividuallFormatada = number_format($precoIndividual, 1, ",", ".");
   
  
      echo "<p> Caro professor, de acordo com os dados dos medicamentos e a busca efetuadas na matriz optivemos o seguinte resultado <br>
      Nome do medicamento pesquisado <span> $medicpesq </span> <br>
      Codigo do medicamento pesquisado <span> $codigoPesq </span> <br>
      valor do medicamento pesquisado <span> $precoIndividual</span><br>";
     }
  }             

?>

</body> 
</html>   
