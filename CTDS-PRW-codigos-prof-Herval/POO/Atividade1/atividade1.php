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
   //inserir a include com a definição da classe do item a ser criado
   require_once "atividade1.inc.php"; 

   //criar o objeto a partir da classe definida, por meio do construtor padrão da classe
   $produto = new Item();

   //definir valores para os atributos do objeto $produto
   $produto->nome = "Impressora";
   $produto->preco = 350.12;
   $produto->categoria = "Periférico";

   //mostrar a categoria do objeto, por meio do métpdp getter
   $categ = $produto->mostrarCategoria();
   echo "<p> Categoria do produto = $categ </p>";

   //mostrar o preço atual do produto, por meio de um método getter
   $precoAtual = $produto->mostrarPreco();
   echo "<p> Preço atual do produto = $precoAtual </p>";

   //alterando o preço atual do produto, por meio de um método setter
   $produto->modificarPreco(550.21);

   //mostrar o preço atualizado
   $precoAlterado = $produto->mostrarPreco();
   echo "<p> Preço do produto, agora já com a alteração = $precoAlterado </p>";

   //vamos criar um segundo objeto produto
   $produto2 = new Item();
   $produto2->nome = "Teclado";
   $produto2->preco = 120.12;
   $produto2->categoria = "Periférico";

   //mostre o preço atual
   $precoAtualObj2 = $produto2->mostrarPreco();
   echo "<p> Preço atual do produto número 2 = $precoAtualObj2 </p>";
  ?>  
</body> 
</html> 