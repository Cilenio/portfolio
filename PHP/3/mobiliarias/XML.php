<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Mobiliárias</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #ffe6e6;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 100px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 200px;
            padding: 5px;
        }

        input[type="submit"],
        .back-button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }

        .back-button {
            display: inline-block;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #555;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid #ccc;
        }

        .message {
            padding: 10px;
            background-color: #f2f2f2;
            color: #333;
            margin-bottom: 20px;
        }
    </style>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            var messageElement = document.getElementById('message');

            // Verifica se a mensagem está presente
            if (messageElement) {
                // Define o tempo para a mensagem desaparecer
                var timeout = setTimeout(function () {
                    messageElement.style.display = 'none';
                }, 900);
            }
        });
    </script>
</head>

<body>
    <?php
    $message = '';

    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $contacto = $_POST['contacto'];
        $localizacao = $_POST['localizacao'];

        // Verifica se o arquivo XML já existe
        if (file_exists('mobiliarias.xml')) {
            // Carrega o arquivo XML existente
            $xml = simplexml_load_file('mobiliarias.xml');
        } else {
            // Cria um novo arquivo XML
            $xml = new SimpleXMLElement('<mobiliarias></mobiliarias>');
        }

        // Cria um novo nó para a mobiliária
        $mobiliaria = $xml->addChild('mobiliaria');
        $mobiliaria->addChild('nome', $nome);
        $mobiliaria->addChild('contacto', $contacto);
        $mobiliaria->addChild('localizacao', $localizacao);

        // Salva o arquivo XML
        $xml->asXML('mobiliarias.xml');

        $message = "Mobiliária cadastrada com sucesso!";
    }
    if (isset($_GET['nomee'])) {
        $doc = simplexml_load_file('mobiliarias.xml');
        foreach ($doc->xpath('//mobiliaria') as $mob) {
            if ((string) $mob->nome === $_GET['nomee']) {
                unset($mob[0]);
            }
        }
        $doc->asXML('mobiliarias.xml');
        // header('location: xml.php');
    }
    ?>

    <div class="container">
        <h2>Cadastro de Mobiliárias</h2>

        <!-- Formulário de cadastro -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="contacto">Contacto:</label>
            <input type="text" id="contacto" name="contacto" required><br><br>

            <label for="localizacao">Localização:</label>
            <input type="text" id="localizacao" name="localizacao" required><br><br>

            <input type="submit" value="Cadastrar">
            <a class="back-button" href="index.php">Voltar</a>
        </form>
        <?php if (!empty($message)): ?>
            <div id="message" class="message">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <br><br>
        <form>
            <?php
            if (file_exists('mobiliarias.xml')) {
                // Carrega o arquivo XML
                $xml = simplexml_load_file('mobiliarias.xml');
                if ($xml->count() > 0) {
                    echo "<h2>Mobiliárias Cadastradas</h2>";
                    // Cria a tabela de mobiliárias
                    echo "<table>";
                    echo "<tr><th>Nome</th><th>Contacto</th><th>Localização</th><th>Accao</th></tr>";
                    // Exibe os dados de cada mobiliária
                    foreach ($xml->mobiliaria as $mobiliaria) {
                        echo "<tr>";
                        echo "<td>" . $mobiliaria->nome . "</td>";
                        echo "<td>" . $mobiliaria->contacto . "</td>";
                        echo "<td>" . $mobiliaria->localizacao . "</td>";
                        echo "<td name'form1_submit'> <a href='XML.php?nomee=". $mobiliaria->nome ."&contact='".$mobiliaria->contacto."''>Apagar<a> </td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>Nenhuma mobiliária cadastrada.</p>";
                }
            } else {
                echo "<p>Nenhuma mobiliária cadastrada.</p>";
            }
            ?>
    </div>
    </form>
</body>

</html>