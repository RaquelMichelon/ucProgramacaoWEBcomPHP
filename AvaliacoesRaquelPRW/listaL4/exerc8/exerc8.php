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
        <h1>Cálculo de Média com PHP </h1>
    </header>
    <section class="grid-container">
        <div class="grid-image">
        <img src="ilustracao.jpg" alt="ilustração">
        </div>
        <div class="grid-form">
                <form action="exerc8.php" method="post">
                    <fieldset>
                        <legend> Notas do Aluno </legend>
                        <label> Nota 1: </label>
                        <input type="number" name="nota1" autofocus step="0.1" min="0" max="10"> <br>

                        <label> Nota 2: </label>
                        <input type="number" name="nota2" step="0.1" min="0" max="10"> <br>

                        <label> Nota 3: </label>
                        <input type="number" name="nota3" step="0.1" min="0" max="10"> <br>

                        <label class="alinha"> Escolha o tipo de Cálculo de Média a ser realizado: </label> <br>
                        <input type="radio" name="media" value="media-aritmetica"> Média Aritmética <br>
                        <input type="radio" name="media" value="media-ponderada"> Média Ponderada <br>


                        <button name="enviar-dados"> Calcular Média </button>

                    </fieldset>
                </form>
            </div>

            <div class="grid-table">
            <?php

                $nomeDaInclude = "include8.inc.php";
                require_once $nomeDaInclude;

                if(isset($_POST["enviar-dados"])) {
                    //8a Receber as três notas
                    $nota1 = $_POST['nota1'];
                    $nota2 = $_POST['nota2'];
                    $nota3 = $_POST['nota3'];

                    //Testar botões de rádio
                    if(isset($_POST['media'])) {
                        $tipoDeMedia = $_POST['media'];
                        //8b Testar se o usuário quer calcular média aritmética ou ponderada
                        //8c Se usuário quer cálculo de média simples:
                        if($tipoDeMedia == "media-aritmetica") {
                            $mediaFinal = calcularMediaAritmetica($nota1, $nota2, $nota3);
                        }
                        //8d Se usuário quer cálculo de média ponderada:
                        else {
                            $mediaFinal = calcularMediaPonderada($nota1, $nota2, $nota3);
                        }
                    }
                    else {
                        exit("<p> É necessário <span> selecionar </span>  um tipo de cálculo de média. Tente mais uma vez! </p>");
                    }

                    $mediaFinalFormatada = number_format($mediaFinal, 1, ".", "");

                    //8e Mostrar as notas e o valor da respectiva média
                    echo "<p> Caro usuário, seguem as <span> Notas e Média </span> do aluno: <br>
                            Nota 1: <span> $nota1 </span> <br> 
                            Nota 2: <span> $nota2 </span> <br> 
                            Nota 3: <span> $nota3 </span> <br> <br> 
                            Média: <span> $mediaFinalFormatada </span> <br> </p>";
                }
            ?>

            </div>  
    </section>
</body>
</html>