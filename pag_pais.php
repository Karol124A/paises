<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página dos países</title>

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

        .voltar {
            margin-top: 20px;
            margin-left: 15px;
            height: 32px;
            width: 32px;
            opacity: 0.7;
        }

        h1 {
            color: rgb(253, 246, 242);
            font-style: bold;
            text-align: center;
            padding-bottom: 20px;
        }

        .historico {
            width: 90%;
            margin-top: 100px;
            margin-bottom: 100px;
            background-color: #fffff9;
            border-radius: 15px;
            margin-left: auto;
            margin-right: auto;
            color: beige;
            overflow: hidden;
            padding: 20px;
        }

        header {
            background-color: #34a0a4;
        }

        #container {
            text-align: center;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            flex-direction: row;
            padding-top: 10px;
            color: beige;
        }

        .nome {
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
        }

        .area {
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
        }

        .localizacao {
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
        }

        .lingua {
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
        }

        .governo {
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
        }

        .linguas {
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
        }

        .u-monetarias {
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
        }

        h5 {
            font-weight: bold;
            margin-bottom: 5px;
            color: #ffb703;
        }

        p {
            font-size: 15px;
            text-align: justify;
            width: auto;
            color: #000000;
        }

        h6 {
            font-size: 15px;
            color: #000000;
        }

        footer {
            height: 500px;
            width: 100%;
        }
    </style>

</head>

<body>
    <?php
    $id = $_GET['id'];

    $url = "https://servicodados.ibge.gov.br/api/v1/paises/{paises}";
    $resposta = (file_get_contents($url));
    $data = json_decode($resposta);
    $controle = 0;

    foreach ($data as $paises) {
        if (strtoupper($paises->id->M49) === strtoupper($id)) {
            if ($controle === 0) {
                $controle = 1;
                echo '<header>
                                    <a href="index.php"><img src="img/seta-esquerda.png" class="voltar"</a>
                                    <h1>' . strtoupper($paises->nome->abreviado) . '</h1>
                                </header>
                        
                                <div class="historico">
                                <div id="container">';

                echo '<div class="nome">
                                <h5> NOME:</h5>
                                <h6>' . $paises->nome->abreviado . '</h6>
                                </div>
                                <div class="area">
                                    <h5> ÁREA:</h5>
                                    <h6>' . $paises->area->total . '</h6>
                                </div>
                                <div class="localizacao">
                                    <h5> LOCALIZAÇÃO:</h5>
                                    <h6>' . $paises->localizacao->regiao->nome . '</h6>
                                </div>
                                <div class="linguas">
                                    <h5> LÍNGUAS:</h5>';
                foreach ($paises->linguas as $linguas) {
                    echo '<h6>' . $linguas->nome . '</h5>';
                }
                echo '</div>
                                <div class="governo">
                                    <h5> CAPITAL:</h5>
                                    <h6>' . $paises->governo->capital->nome . '</h6>
                                </div>
                                <div class="u-monetarias">
                                    <h5> UNIDADES MONETÁRIAS:</h5>';
                foreach ($paises->{'unidades-monetarias'} as $unidademoney) {
                    echo '<h6>' . $unidademoney->nome . '</h5>';
                }

                echo '</div>';
                echo '</div>';
                echo '<p style="margin-left: 30px; margin-right: 30px;" class="u-monetarias">' . $paises->historico . '</p>';
            }
        }
    }
    ?>
</body>

</html>