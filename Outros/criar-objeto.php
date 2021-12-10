<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario aqui</title>
</head>
<body>
    <?php
        $includeClasseBancoDeDados = "criar-classe-banco.inc.php";
        require_once($includeClasseBancoDeDados);

        $banco = new BancoDeDados("localhost", "root", "", "CTDS", "alunos");

        //para visualizar o conteudo de um objeto - nao eh para o usuario final
        //var_dump($banco);

        $conexao = $banco->criarConexao();
        //echo "<p> A conexao foi criada com sucesso. </p>";

        $banco->criarBanco($conexo);
        // echo "<p> Banco de dados $banco->nomeDoBanco criado com sucesso. </p>";
        


    ?>
</body>
</html>

