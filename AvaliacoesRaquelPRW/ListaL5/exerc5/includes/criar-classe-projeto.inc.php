<?php
 class Projeto {
    public $id;
    public $orcamento;
    public $dataInicio;
    public $horasNecessarias;


    function receberDados($conexao) {
        $id                = $conexao->escape_string(trim($_POST['id']));
        $orcamento         = $conexao->escape_string(trim($_POST['orcamento']));
        $dataInicio        = $conexao->escape_string(trim($_POST['data-inicio']));
        $horasNecessarias  = $conexao->escape_string(trim($_POST['horas-necessarias']));

        //atribuir os dados do formulário aos atributos da classe Projeto
        $this->id                = $id;
        $this->orcamento         = $orcamento;
        $this->dataInicio        = $dataInicio;
        $this->horasNecessarias  = $horasNecessarias;
   }

    //método para cadastrar as informações do formulário no DB 
    function cadastrar($conexao, $nomeDaTabela) {
        $sql = "INSERT $nomeDaTabela VALUES(
                    '$this->id',
                    $this->orcamento,
                    '$this->dataInicio',
                    $this->horasNecessarias
                    )";   

        $conexao->query($sql) or die($conexao->error);
   }

   //método para listar ID e orcamento de cada projeto cadastrado
    function listarIdComOrcamento($conexao, $nomeDaTabela) {
        $sql = "SELECT id, orcamento FROM $nomeDaTabela ORDER BY id ASC";
        $resultado = $conexao->query($sql) or die($conexao->error);

        echo "
            <table>
                <caption> Projetos Listados por ID e Orçamento </caption>
                <tr>
                    <th> ID </th>
                    <th> ORÇAMENTO </th>
                </tr>";

        While($registro = $resultado->fetch_array()) {
            $id         = htmlentities($registro[0], ENT_QUOTES, 'UTF-8');
            $orcamento  = htmlentities($registro[1], ENT_QUOTES, 'UTF-8');

            echo "
                <tr>
                    <td> $id </th>
                    <td> R$ $orcamento </th>
                </tr>";
        }

        echo "</table>";
   }

   //esse método foi criado apenas para que eu pudesse treinar e não faz parte da avaliação.
   function buscarDados($conexao, $nomeDaTabela) {
        $idDoProjeto = $conexao->escape_string(trim($_POST["id-busca"]));

        $sql = "SELECT orcamento FROM $nomeDaTabela WHERE id = '$idDoProjeto'";
        $resultado = $conexao->query($sql) or exit($conexao->error);

        if($conexao->affected_rows == 0) {
            die("<p> Ops! Não há projetos cadastrados com o Id <span> $idDoProjeto </span> em nossa base de dados. Tente mais uma vez! </p>");
        }
        else {

            $registro = $resultado->fetch_array();
            $orcamentoProjeto = $registro[0];
            $orcamentoProjeto = htmlentities($orcamentoProjeto, ENT_QUOTES, "UTF-8");


            $informacoesDoProjeto = [$idDoProjeto, $orcamentoProjeto];
            return $informacoesDoProjeto;	
        }
   }


    //método para mostrar número de projetos com data de início posterior a 01/01/2020
    function mostrarProjetosMaisNovos($conexao, $nomeDaTabela) {
       $sql = "SELECT COUNT(*) FROM $nomeDaTabela WHERE inicio > '2020/01/01'";
       $resultado = $conexao->query($sql) or die($conexao->error);

       $registro = $resultado->fetch_array();

       $quantidadeProjetos = htmlentities($registro[0], ENT_QUOTES, 'UTF-8');

       if($quantidadeProjetos == 0) {
        echo "<p> Prezado(a), <span> não há registros </span> de projetos com início a partir de 01 jan 2020. </p>";
       }
       else {
        echo "<p> Prezado(a), há <span> $quantidadeProjetos </span> projeto(s) cadastrado(s) com início a partir de 01 jan 2020. </p>";
       }

    }


   //método para excluir os registros com número de horas de execução menor que 100 horas e orçamento inferior a R$1000,00
   function excluirProjetos($conexao, $nomeDaTabela) {
       $sql = "DELETE FROM $nomeDaTabela WHERE horas < 100 AND orcamento < 1000";
       $resultado = $conexao->query($sql) or die($conexao->error);

       $excluidos = $conexao->affected_rows;
       
       if($excluidos == 0) {
           echo "<p> Prezado(a), <span> não há registros </span> de projetos que se enquadrem na condição de possuir orçamento inferior a R$1000,00 e tempo de execução inferior a 100 horas para serem excluídos. </p>";
       }

       else {
        echo "<p> Prezado(a), deletou-se um total de <span> $excluidos </span> projeto(s). </p>";
       }
   }

  }