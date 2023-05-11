<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        @import url('https://fonts.google.com/specimen/Montserrat');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: #004E64;
        }

        header {
            width: 100%;
            background-color: #023047;
            align-items: center;
            padding-left: 2%;
        }

        header h1 {
            color: #FFB703;
            padding: 30px;
        }

        .conteudo {
            padding: 30;
            margin: 3%;
        }

        h2 {
            width: 100%;
            text-align: center;
            color: #ffffff;
            margin-top: 100px;
            margin-bottom: 100px;
        }

        .linhaconteudo {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            flex-direction: row;

        }

        .pais {
            width: 18%;
            margin-top: 1%;
            margin-bottom: 1%;
            margin-left: 1%;
            margin-right: 1%;
            background-color: #ffffff;
            padding-top: 20px;
            padding-bottom: 20px;
            border-radius: 15px;
        }

        .pais:hover {
            background-color: #9fffcb;
            width: 20%;
            margin-left: 0%;
            margin-right: 0%;
            margin-top: 0%;
            margin-bottom: 0%;
            padding-top: 1%;
            padding-bottom: 1%;
        }

        .nomepais {
            text-align: center;
        }

        .informacoes {
            width: 100%;
            text-align: center;
        }

        a {
            display: block;
            text-align: center;
            margin: 0 auto;
            margin-top: 10%;
            color: #004e64;
            font-style: normal;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <header>
        <h1>World Map</h1>
    </header>

    <div class="conteudo">
        <h2>Confira os dados sobre os países aqui:</h2>

        <div class="linhaconteudo">
            <?php
            $url = "https://servicodados.ibge.gov.br/api/v1/paises/{paises}";
            $resposta = (file_get_contents($url));
            $data = json_decode($resposta);

            foreach ($data as $paises) {
                $id = $paises->id->M49;
                echo '
                    <div class="pais">
                        <h4 class="nomepais">' . $paises->nome->abreviado . '</h4>
                        <h5 class="informacoes" style="margin-top: 10px;">' . $paises->governo->capital->nome . '</h5>
                        <h5 class="informacoes">' . $paises->localizacao->regiao->nome . '</h5>';
                foreach ($paises->linguas as $linguas) {
                    echo '<h5 class="informacoes">' . $linguas->nome . '</h5>';
                }
                echo '<a href="pag_pais.php?id=' . $id . '">Veja Mais</a>';
                echo '</div>';
            }
            ?>
        </div>

</body>

</html>