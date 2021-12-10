<?php
 class Pacientes
  {
  public $nome;
  public $crmMedico;
  public $dataInternacao;  

  function receberDados($conexao)
   {
   $crm     = $conexao->escape_string(trim($_POST['crm-medico']));
   $nome    = $conexao->escape_string(trim($_POST['nome-paciente']));
   $data    = $conexao->escape_string(trim($_POST['data-internacao']));

   $this->nome           = $nome;
   $this->crmMedico      = $crm;
   $this->dataInternacao = $data;
   }

  function cadastrar($conexao, $nomeDaTabela2)
   {
   $sql = "INSERT $nomeDaTabela2 VALUES(
              null,
              '$this->nome',
              '$this->dataInternacao',
              '$this->crmMedico')";

   $conexao->query($sql) or die($conexao->error);
   }
  }