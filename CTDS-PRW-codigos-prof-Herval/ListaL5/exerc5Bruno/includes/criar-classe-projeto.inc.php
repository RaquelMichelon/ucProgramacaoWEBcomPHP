<?php

    class Projeto
    {       
        public $id;
        public $orcamento;
        public $dataInicio;
        public $totalHoras;

        function receberDados($conexao) //Dados locais:
        {
            $id         = $conexao->escape_string(trim($_POST['id']));
            $orcamento  = $conexao->escape_string(trim($_POST['orcamento']));
            $data       = $conexao->escape_string(trim($_POST['data-inicio']));
            $totalHoras = $conexao->escape_string(trim($_POST['total-horas']));

            //Atributos       / Dados do formulário
            $this->id         = $id;
            $this->orcamento  = $orcamento;
            $this->dataInicio = $data;
            $this->totalHoras = $totalHoras;
        }

        function cadastrar($conexao, $nomeDaTabela)
        {
            $sql = "INSERT $nomeDaTabela VALUES
            (
                '$this->id',
                $this->orcamento,
                '$this->dataInicio',
                $this->totalHoras
            )";

            $conexao->query($sql) or die($conexao->error);
        }
        
        function listarIdOrcamento($conexao, $nomeDaTabela)
        {
            $sql = "SELECT id, orcamento FROM $nomeDaTabela ORDER BY id ASC";
            $resultado = $conexao->query($sql) or die($conexao->error);

            echo
            "<table>
                <caption> Lista de projetos cadastrados por ID e Orçamento </caption>
                <tr>
                    <th> Id </th>
                    <th> Orçamento </th>
                </tr>";

            While($registro = $resultado->fetch_array())
            {              
               $id        = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
               $orcamento = htmlentities($registro[1], ENT_QUOTES, "UTF-8");
            
               echo
               "<tr>
                    <td> $id </td>
                    <td> $orcamento </td>
                </tr>";
            }
            echo "</table>";
        }

        function projetosAtuais($conexao, $nomeDaTabela)
        {
            $sql = "SELECT count(*) FROM projetos WHERE inicio > '2020/01/01'";
            $resultado = $conexao->query($sql) or die($conexao->error);
            
            $totalRegistros = $conexao->affected_rows;
            if($totalRegistros == 0)
            {
                echo"<p> Caro usuário, não há registros em projetos atuais. </p>";
            }
            else
            {
                $registro = $resultado->fetch_array();   
                $atuais = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
                return $atuais;
            }          
        }

        function excluirProjetos($conexao, $nomeDaTabela)
        {
            $sql = "DELETE FROM projetos WHERE tempo < 100 AND orcamento < 1000";
            $resultado = $conexao->query($sql) or die($conexao->error);

            $totalExcluidos = $conexao->affected_rows;
            if($totalExcluidos == 0)
            {
                echo "<p> Caro usuário, não há projetos a serem excluídos </p>";
            }
            else if($totalExcluidos == 1)
            {
                echo "<p> Caro usuário, <span> $totalExcluidos </span> projeto foi excluído.";
            }
            else
            {
                echo "<p> Caro usuário, <span> $totalExcluidos </span> projetos foram excluídos.";            
            }
        }
    }
?>