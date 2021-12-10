<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <title> Programação Web com PHP </title>
    <link rel="stylesheet" href="./CSS/formata-formulario5.css">
  </head>

  <body>
    <h1> Fundamentos do PHP com mySQL - Processando registros de projetos </h1>
    <form action="exerc5.php" method="post">
      <fieldset>
        <legend> Cadastro de projetos </legend>

        <label> Forneça o Id do projeto: </label>
        <input type="text" name="id" autofocus> <br>

        <label> Orçamento aprovado: </label>
        <input type="number" name="orcamento" step="0.01" min="0"> <br>

        <label> Data de início: </label>
        <input type="date" name="data-inicio"> <br>

        <label> Total de horas para execução: </label>
        <input type="number" name="total-horas" step="1" min="0"> <br>

        <button name="cadastrar"> Cadastrar informações no banco de dados </button>
      </fieldset>

      <fieldset>
        <legend> Consulta ao banco de dados: </legend>
          
        <button name="listar-projetos"> Listar projetos por ID e Orçamento </button> <br>

        <button name="listar-atuais"> Quantidade de projetos a partir de 01/01/2020 </button> <br>
      </fieldset>

      <fieldset>
        <legend> Excluir projetos não prioritários: </legend>
          
        <label class="alinha"> Projetos com tempo de execução menor que 100 horas e orçamento inferior a R$1.000,00. </label> <br>
          
        <button name="excluir-projetos"> Excluir! </button> <br>
      </fieldset>
    </form>

    <?php
      $includeClasseProjeto     = "./includes/criar-classe-projeto.inc.php";
      $includeClasseBancoDeDados = "./includes/criar-classe-banco.inc.php";
      require_once $includeClasseProjeto;
      require_once $includeClasseBancoDeDados;

      $banco = new BancoDeDados("localhost", "root", "root", "CTDS", "projetos"); //Parâmetros: servidor, usuário, senha, nome do banco de dados e nome da tabela.

      $conexao = $banco->criarConexao();

      $banco->criarBanco($conexao);
      $banco->abrirBanco($conexao);
      $banco->definirCharset($conexao);
      $banco->criarTabela($conexao);
    
      $projeto = new Projeto();

      if(isset($_POST['cadastrar']))
      {
        $projeto->receberDados($conexao);
        $projeto->cadastrar($conexao, $banco->nomeDaTabela);
        echo"<p> Dados do projeto cadastrados com sucesso na base de dados! </p>";
      }
      
      if(isset($_POST["listar-projetos"]))
      {
        $listar = $projeto->listarIdOrcamento($conexao, $banco->nomeDaTabela);
      }

      if(isset($_POST["listar-atuais"]))
      {
        $atuais = $projeto->projetosAtuais($conexao, $banco->nomeDaTabela);
        echo "<p> Caro usuário, o total de projetos contratados a partir de 01/01/2020 é: <span> $atuais </span> </p>";    
      }
      
      if(isset($_POST["excluir-projetos"]))
      {
        $excluidos = $projeto->excluirProjetos($conexao, $banco->nomeDaTabela);
      }      
      $banco->desconectar($conexao);
    ?>
  </body>
</html>