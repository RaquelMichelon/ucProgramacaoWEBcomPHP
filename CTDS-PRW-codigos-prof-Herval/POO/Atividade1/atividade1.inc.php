<?php
 //definindo a classe, a partir da qual todos os itens (objetos) da nossa aplicação serão criados

 class Item 
  {
  //definir os atributos
  public $nome;
  public $preco;
  public $categoria;

  //métodos da classe
  //método que lê ou recupera a categoria do objeto (getter)
  function mostrarCategoria()
   {
   return $this->categoria;
   }


  //método para modificar ou alterar ou escrever o novo preço do produto (setter)
  function modificarPreco($novoPreco)
   {
   $this->preco = $novoPreco;
   }

  //método para recuperar ou ler (getter) o preço de determinado produto
  function mostrarPreco()
   {
   return $this->preco;
   }
  }
 
