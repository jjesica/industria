<?php
include 'conexao.php';

if (isset($_GET['pec_codigo'])) {
    $pec_codigo = mysqli_real_escape_string($conn, $_GET['pec_codigo']);
    $sql = "SELECT * FROM Pecas WHERE pec_codigo='$pec_codigo'";
    $result = mysqli_query($conn, $sql);
    $peca = mysqli_fetch_assoc($result);
} else {
    echo "<p>Peça não encontrada.</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .formContainer {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        h2 {
            color: #007bff;
            margin-top: 0;
        }
        fieldset {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: 20px;
            clear: both;
        }
    </style>
</head>
<body>
    <header>
        <h1>Cadastro de Peças</h1>
        <h2>Editar Peça</h2>
    </header>
    <div class="formContainer">
        <form method="POST" action="processar_editar_pecas.php">
            <input type="hidden" name="pec_codigo" value="<?php echo $peca['pec_codigo']; ?>">
            
            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" value="<?php echo $peca['numero']; ?>" required>
            
            <label for="peso">Peso:</label>
            <input type="text" id="peso" name="peso" value="<?php echo $peca['peso']; ?>" required>
            
            <label for="cor">Cor:</label>
            <input type="text" id="cor" name="cor" value="<?php echo $peca['cor']; ?>" required>
            
            <input type="submit" value="Atualizar">
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Cadastro de Peças</p>
    </footer>
</body>
</html>
