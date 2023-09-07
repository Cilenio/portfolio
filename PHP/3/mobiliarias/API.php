<!DOCTYPE html>
<html>
<head>
    <title>Dados da API</title>
    <style>
                
.pagination {
    margin-top: 20px;
}

.page-link {
    display: inline-block;
    padding: 5px 10px;
    background-color: #f2f2f2;
    color: #333;
    text-decoration: none;
    margin-right: 5px;
    border-radius: 3px;
}

.page-link:hover {
    background-color: #ddd;
}

.current-page {
    display: inline-block;
    padding: 5px 10px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    margin-right: 5px;
    border-radius: 3px;
}



        body {
            font-family: "Arial", sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
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

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .back-button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }

        .back-button:hover {
            background-color: #555;
        }
        .download-button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-left: 10px;
        }

        .download-button:hover {
            background-color: #555;
        }
    </style>

<!DOCTYPE html>
<html>
<head>
    
<body>
    <div class="container">
        <h2>Dados da API</h2>

        <?php
// Definição da URL da API
$url = "https://jsonplaceholder.typicode.com/posts";

// Parâmetros de paginação
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Página atual, padrão é a página 1
$limit = 10; // Número de itens por página

// Calcular o deslocamento com base na página atual e no limite
$offset = ($page - 1) * $limit;

// Obter os dados JSON da API
$jsonData = file_get_contents($url);

// Decodificar os dados JSON obtidos com sucesso
$data = json_decode($jsonData, true);

// Verificar se os dados foram obtidos com sucesso
if ($data) {
    // Aplicar a lógica de paginação
    $totalItems = count($data); // Número total de itens
    $totalPages = ceil($totalItems / $limit); // Número total de páginas

    // Extrair apenas os itens da página atual
    $pagedData = array_slice($data, $offset, $limit);

    // Exibir os dados em uma tabela HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Título</th><th>Corpo</th></tr>";

    // Loop para exibir cada post
    foreach ($pagedData as $post) {
        echo "<tr>";
        echo "<td>".$post['id']."</td>";
        echo "<td>".$post['title']."</td>";
        echo "<td>".$post['body']."</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Exibir os links de paginação
    echo "<div class='pagination'>";
    if ($page > 1) {
        echo "<a href='index.php?page=".($page - 1)."' class='page-link'>&laquo; Anterior</a>";
    }

    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $page) {
            echo "<span class='current-page'>".$i."</span>";
        } else {
            echo "<a href='index.php?page=".$i."' class='page-link'>".$i."</a>";
        }
    }

    if ($page < $totalPages) {
        echo "<a href='index.php?page=".($page + 1)."' class='page-link'>Próxima &raquo;</a>";
    }
    echo "</div>";

    // Botão "Baixar Dados"
    $downloadData = json_encode($pagedData);
    $fileName = "dados_api.json";
    echo '<a class="download-button" href="download.php?data=' . urlencode($downloadData) . '&fileName=' . urlencode($fileName) . '">Baixar Dados</a>';
} else {
    // Exibir mensagem de erro caso os dados não possam ser obtidos
    echo "Erro ao obter os dados da API!";
}
?>

<a class="back-button" href="index.php">Voltar</a>
</body>
</html>
