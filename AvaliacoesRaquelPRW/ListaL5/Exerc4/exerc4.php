<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Programação Web com PHP </title> 
  <link rel="stylesheet" href="./css/formata-formulario.css">
</head> 

<body> 
 <h1> Fundamentos do PHP com MySQL - Clínica Médica </h1>
 <form action="exerc4.php" method="post">
  <fieldset>
    <legend> Cadastro de médicos </legend>  

    <label class="alinha"> Nome: </label>
    <input type="text" name="nome-medico" autofocus> <br>

    <label class="alinha"> CRM: </label>
    <input type="text" name="crm" autofocus> <br>

    <button name="cadastrar-medico"> Cadastrar médico </button>
  </fieldset>

  <fieldset>
    <legend> Cadastro de pacientes </legend>

    <label class="alinha"> Nome: </label>
    <input type="text" name="nome-paciente"> <br>

    <label class="alinha"> Atendido pelo médico (CRM): </label>
    <input type="text" name="crm-medico"> <br>

    <label class="alinha"> Data da internação: </label>
    <input type="date" name="data-internacao"> <br>

    <button type="submit" name="cadastrar-paciente"> Cadastrar paciente </button>
  </fieldset>

  <fieldset>
    <legend> Pesquisa por médico </legend>

    <label class="alinha"> Nome: </label>
    <input type="text" name="pesquisa-nome-medico"> 

    <button type="submit" name="pesquisar-medico"> Pesquisar médico </button>
  </fieldset> 
 </form>

 <?php 
   $includeClasseMedico       = "./includes/criar-classe-medico.inc.php";
   $includeClassePaciente     = "./includes/criar-classe-paciente.inc.php";
   $includeClasseBancoDeDados = "./includes/criar-classe-banco.inc.php";
   require_once $includeClasseBancoDeDados; 
   require_once $includeClasseMedico;  
   require_once $includeClassePaciente;  

   $banco = new BancoDeDados("localhost", "root", "", "CTDS", "medicos", "pacientes");

   $conexao = $banco->criarConexao();

   $banco->criarBanco($conexao); 

   $banco->abrirBanco($conexao);

   $banco->definirCharset($conexao);

   //a ordem de criação das tabelas, aqui (com chave estrangeira), é importante

   $banco->criarTabela1($conexao);

   $banco->criarTabela2($conexao);

   //vamos criar o objeto para armazenar os dados de cada médico cadastrado
   $medico = new Medicos();

   //vamos criar o objeto paciente
   $paciente = new Pacientes();

   //cadastrar médico
   if(isset($_POST['cadastrar-medico']))
    {
    $medico->receberDados($conexao);
    $medico->cadastrar($conexao, $banco->nomeDaTabela1);
    echo "<p> Cadastro de médico efetuado com sucesso na base de dados. </p>";
    }

   if(isset($_POST["cadastrar-paciente"]))
    {
    $paciente->receberDados($conexao);
    $paciente->cadastrar($conexao, $banco->nomeDaTabela2);
    echo "<p> Cadastro de paciente efetuado com sucesso na base de dados. </p>";
    }

   $banco->desconectar($conexao);   
 ?>    
</body> 
</html> 