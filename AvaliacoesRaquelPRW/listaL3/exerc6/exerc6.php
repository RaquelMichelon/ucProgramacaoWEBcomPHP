<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programação WEB com PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="page-content">
    <header>
        <h1>Dados cadastrais da Farmácia com matrizes em PHP</h1>
    </header>
    <section class="grid-container">
        <div class="grid-image">
        <img src="https://us.123rf.com/450wm/ahasoft2000/ahasoft20001603/ahasoft2000160303732/54235134-farmacia-icono-de-vector-estilo-de-la-imagen-es-un-s%C3%ADmbolo-de-icono-de-luz-plana-en-un-bot%C3%B3n-rojo-redondo.jpg?ver=6" alt="logo-da-farmacia">
        </div>
        <div class="flex-container grid-form">
                <form action="exerc6.php" method="post">
                    <fieldset>
                        <legend> Cadastro do medicamento 1</legend>
                        <label class="alinha"> Código do Medicamento:  </label>
                        <input type="text" name="cod1" autofocus placeholder="Cod. do medicamento"> <br>

                        <label class="alinha"> Nome do Medicamento: </label>
                        <input type="text" name="med1"> <br>

                        <label class="alinha"> Preço do Medicamento: </label>
                        <input type="number" name="preco1" step="0.01" min="0"> <br>
                    </fieldset> 

                    <fieldset>
                        <legend> Cadastro do medicamento 2</legend>
                        <label class="alinha"> Código do Medicamento: </label>
                        <input type="text" name="cod2" placeholder="Cod. do medicamento"> <br>

                        <label class="alinha"> Nome do Medicamento: </label>
                        <input type="text" name="med2"> <br>

                        <label class="alinha"> Preço do Medicamento: </label>
                        <input type="number" name="preco2" step="0.01" min="0"> <br>
                    </fieldset>

                    <fieldset>
                        <legend> Cadastro do medicamento 3</legend>
                        <label class="alinha"> Código do Medicamento: </label>
                        <input type="text" name="cod3" placeholder="Cod. do medicamento"> <br>

                        <label class="alinha"> Nome do Medicamento: </label>
                        <input type="text" name="med3"> <br>

                        <label class="alinha"> Preço do Medicamento: </label>
                        <input type="number" name="preco3" step="0.01" min="0"> <br>
                    </fieldset>

                    <fieldset>
                        <legend> Pesquisar por Medicamento </legend>
                        <label class="alinha"> Código do Medicamento: </label>
                        <input type="text" name="pesquisa-codigo"> <br>
                    </fieldset>

                    <button name="enviar-dados">Cadastrar e Mostrar Medicamentos</button>
                </form>
            </div>

            <div class="grid-table">
            <?php
                if(isset($_POST["enviar-dados"])) {
                    $codigo1 = $_POST['cod1'];
                    $codigo2 = $_POST['cod2'];
                    $codigo3 = $_POST['cod3'];
                    
                    $medicamento1 = $_POST['med1'];
                    $medicamento2 = $_POST['med2'];
                    $medicamento3 = $_POST['med3'];

                    $preco1 = $_POST['preco1'];
                    $preco2 = $_POST['preco2'];
                    $preco3 = $_POST['preco3'];

                    $codigoMedicamentoPesquisado = $_POST["pesquisa-codigo"];

                    //6a) Armazenar os dados em uma estrutura matricial, usando o código do medicamento como índice associativo.
                    $medicamentos[$codigo1] = [$medicamento1, $preco1];
                    $medicamentos[$codigo2] = [$medicamento2, $preco2];
                    $medicamentos[$codigo3] = [$medicamento3, $preco3];

                    //6b) Mostrar os dados de todos os medicamentos cadastrados na matriz em uma tabela.
                    echo "<p> </p> <table>
                            <caption> Dados dos Medicamentos Cadastrados </caption>
                            <tr>
                                <th> | Código | </th>
                                <th> | Nome do Medicamento | </th>
                                <th> | Preço (R$) | </th>
                            </tr>";
                    
                    foreach($medicamentos as $codigo => $vetorInterno) {
                        
                        $precoMedicamento[$codigo] = $vetorInterno[1];
                        $precoMedicamentoFormatado = number_format($precoMedicamento[$codigo], 2, ",", ".");

                        echo "<tr>
                                <td>$codigo</td>
                                <td>$vetorInterno[0]</td>
                                <td>$precoMedicamentoFormatado</td>  
                            </tr>";
                    }
                    echo "</table>";

                    //6c) Mostrar o nome do medicamento mais barato cadastrado.
                    
                    //o valor do medicamento mais barato
                    $maisBarato = min($precoMedicamento);
                    $maisBaratoFormatado = number_format($maisBarato, 2, ",", ".");

                    //código do medicamento mais Barato
                    $codigoDoMedMaisBarato = array_search($maisBarato, $precoMedicamento);

                    //nome do medicamento mais barato
                    $nomeDoMaisBarato = $medicamentos[$codigoDoMedMaisBarato][0];

                    echo "<p> Medicamento cadastrado mais barato: <br>
                           Nome: <span> $nomeDoMaisBarato </span> <br> 
                           Preço (R$): <span> $maisBaratoFormatado </span> </p>";

                    // 6d) Pesquisar na matriz o código do medicamento pesquisado pelo usuário e mostrar todas as informações do medicamento. Se não encontrado, mostrar mensagem apropriada

                    foreach($medicamentos as $codigo => $vetorInt) {
                            $vetorAuxiliar[$codigo] = $codigo;
                    }

                    $descobertaDoMedicamentoPesquisado = array_search($codigoMedicamentoPesquisado, $vetorAuxiliar);


                    if($descobertaDoMedicamentoPesquisado == false) {
                        echo "<p> O código <span> $codigoMedicamentoPesquisado </span> não foi encontrado. Por favor, tente novamente! </p> ";
                    }
                    else {
                        $precoDoMedicamentoPesquisado = $medicamentos[$descobertaDoMedicamentoPesquisado][1];
                        $precoDoMedicamentoPesquisadoFormatado = number_format($precoDoMedicamentoPesquisado, 2, ",", ".");
                        $nomeDoMedicamentoPesquisado = $medicamentos[$descobertaDoMedicamentoPesquisado][0];

                        
                        echo "<p> Caro usuário, seguem as informações do medicamento para o código inserido: <br>
                            Medicamento: <span> $nomeDoMedicamentoPesquisado </span> <br>
                            Preço (R$): <span> $precoDoMedicamentoPesquisadoFormatado </span> <br>
                            Código de Cadastro: <span> $codigoMedicamentoPesquisado </span> </p> ";
                    }

                    //6e) Ordenar os dados de todos os medicamentos cadastrados por nome do medicamento em ordem alfabética crescente.
                    foreach($medicamentos as $codigo => $nomes) {
                        $vetorSoNomes[$codigo] = $nomes[0];
                    }

                    asort($vetorSoNomes);

                    echo "<table>
                            <caption> Dados dos Medicamentos Cadastrados em Ordem Alfabética Crescente </caption>
                            <tr>
                                <th> | Nome do Medicamento | </th>
                                <th> | Código | </th>
                                <th> | Preço (R$) | </th>
                            </tr>";
                    
                    foreach($vetorSoNomes as $codigo => $medicamento) {
                        
                        $nome = $medicamentos[$codigo][0];
                        $vetorSoPrecos = $medicamentos[$codigo][1];
                        $vetorSoPrecosFormatado = number_format($vetorSoPrecos, 2, ",", ".");

                        echo "<tr>
                                <td>$nome</td>
                                <td>$codigo</td>
                                <td>$vetorSoPrecosFormatado</td>  
                            </tr>";
                    }
                    echo "</table> <p> </p> ";
  
                }
            ?>

            </div>  
    </section>
</body>
</html>