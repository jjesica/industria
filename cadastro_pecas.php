<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Peças</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background: #35424a;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
        }

        .formContainer {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background: #35424a;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #434e58;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background: #35424a;
            color: #ffffff;
        }

        a {
            color: #35424a;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #35424a;
            border-radius: 5px;
            transition: background 0.3s;
        }

        a:hover {
            background: #35424a;
            color: #ffffff;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.8em;
        }
    </style>
</head>
<body>
    <header>
        <h1>Cadastro de Peças</h1>
    </header>
    <div class="formContainer">
        <h1>Cadastro:</h1>
        <form method="POST" action="processar_cadastro_pecas.php" id="pecaForm">
            <fieldset>
                <legend>Insira os dados:</legend>

                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" placeholder="Digite o Número..." required>

                <label for="peso">Peso:</label>
                <input type="text" id="peso" name="peso" placeholder="Digite o Peso..." required>

                <label for="cor">Cor:</label>
                <input type="text" id="cor" name="cor" placeholder="Digite a Cor..." required>

                <input type="submit" value="Cadastrar" class="btn" style="font-size: 16px">
            </fieldset>
        </form>
        <h2>Lista de Peças Cadastradas:</h2>
        <table border="1">
            <tr>
                <th>Número</th>
                <th>Peso</th>
                <th>Cor</th>
                <th>Ações</th>
            </tr>
            <?php
            include 'conexao.php';
            $sql = "SELECT * FROM Pecas";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['numero'] . "</td>";
                echo "<td>" . $row['peso'] . "</td>";
                echo "<td>" . $row['cor'] . "</td>";
                echo "<td>
                        <a href='editar_pecas.php?pec_codigo=" . $row['pec_codigo'] . "'>Editar</a>
                        <a href='excluir_pecas.php?pec_codigo=" . $row['pec_codigo'] . "' onclick='return confirm(\"Tem certeza que deseja excluir esta peça?\")'>Excluir</a>
                      </td>";
                echo "</tr>";
            }
            mysqli_close($conn);
            ?>
        </table>
    </div>
    <footer>
        <p>&copy; 2024 Cadastro de Peças</p>
    </footer>
</body>
</html>
