<!DOCTYPE html> 
<html lang="pt-BR"> 
  <head> 
    <meta charset="utf-8"> 
    <title> Programação Web com PHP </title> 
    <link rel="stylesheet" href="./css/formata-formulario.css">
  </head> 

  <body class='page-content'>
    <header class='header'>
      <h1> Cadastro e Consulta de Projetos </h1>
    </header> 
  
    <session class='grid-container'>
      <div class='grid-form'> 
        <form action="exerc5.php" method="post">
          <fieldset>
            <legend> Dados para cadastro do Projeto </legend>

            <label class="alinha"> ID do projeto: </label>
            <input type="text" name="id" autofocus> <br>

            <label class="alinha"> Orçamento do projeto em R$: </label>
            <input type="number" name="orcamento" step="0.01" min="0"> <br>

            <label class="alinha"> Data da início: </label>
            <input type="date" name="data-inicio"> <br>

            <label class="alinha"> Número de horas necessárias: </label>
            <input type="number" name="horas-necessarias" min="0"> <br>
            
            <button name="cadastrar"> Cadastrar Projeto </button>
          </fieldset>

          <fieldset>
            <legend> Listar ID e Orçamento de cada Projeto do Banco de Dados </legend>
            <button name="listar"> Listar </button>
          </fieldset>

          <fieldset>
            <legend> Buscar por projeto para Listar ID e Orçamento </legend>
            <label class="alinha"> ID do Projeto: </label>
            <input type="text" name="id-busca"> <br>
            <button name="buscar"> Buscar </button>
          </fieldset>

          <fieldset>
            <legend> Números de Projetos com início a partir de 01 jan. 2020 </legend>
            <button name="mostrar-quantidade"> Mostrar Quantidade </button>
          </fieldset>

          <fieldset>
            <legend> Exclusão de Projetos com menos de 100 horas de duração, com orçamento inferior a R$ 1000,00 </legend>
            <button name="excluir-projetos"> Excluir Projetos </button> 
          </fieldset>
        </form>
      </div>

      <div class="grid-table">

        <?php 
        $includeClasseProjeto      = "./includes/criar-classe-projeto.inc.php";
        $includeClasseBancoDeDados = "./includes/criar-classe-banco.inc.php";
        require_once $includeClasseProjeto;
        require_once $includeClasseBancoDeDados;   
        
        //Professor Herval, no meu pc, preciso colocar a senha como "root", então para o professor testar em seu computador, possivelmente seja necessário modificar a senha para "" 
        $banco = new BancoDeDados("localhost", "root", "root", "CTDS", "projetos");

        $conexao = $banco->criarConexao();

        $banco->criarBanco($conexao); 

        $banco->abrirBanco($conexao);

        $banco->definirCharset($conexao);

        $banco->criarTabela($conexao);


        $projeto = new Projeto();

        if(isset($_POST["cadastrar"])) {
          $projeto->receberDados($conexao);
          $projeto->cadastrar($conexao, $banco->nomeDaTabela);

          echo "<p> <span> Deu tudo certo </span> e os dados do projeto foram <span> cadastrados com sucesso </span> na base de dados. </p>";
        } 
      
        if(isset($_POST["listar"])) {
          $lista = $projeto->listarIdComOrcamento($conexao, $banco->nomeDaTabela);
        } 

        //Acrescentei a busca por id para treinar, o professor pode ignorar este item  
        if(isset($_POST["buscar"])) {
          $vetorProjeto = $projeto->buscarDados($conexao, $banco->nomeDaTabela);

          echo "<p> Dados do Projeto: <br> 
                <span> Id: </span> $vetorProjeto[0] <br> 
                <span> Orçamento: </span> R$ $vetorProjeto[1] <br> </p>";
        } 

        if(isset($_POST["mostrar-quantidade"])) {
          $projetosNovos = $projeto->mostrarProjetosMaisNovos($conexao, $banco->nomeDaTabela);
        } 

        if(isset($_POST["excluir-projetos"])) {
          $projeto->excluirProjetos($conexao, $banco->nomeDaTabela);
        }
        
        $banco->desconectar($conexao);   
        ?>
      </div>
    </section>    
  </body> 
</html> 