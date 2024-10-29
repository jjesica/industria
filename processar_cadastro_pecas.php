<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = mysqli_real_escape_string($conn, $_POST['numero']);
    $peso = mysqli_real_escape_string($conn, $_POST['peso']);
    $cor = mysqli_real_escape_string($conn, $_POST['cor']);

    $checkSql = "SELECT * FROM Pecas WHERE numero='$numero'";
    $result = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($result) > 0) {
        echo "<p>Um registro com esse número já existe.</p>";
        echo "<a href='cadastro_pecas.php'>Voltar para o cadastro</a>";
    } else {
        $sql = "INSERT INTO Pecas (numero, peso, cor) VALUES ('$numero', '$peso', '$cor')";
        if (mysqli_query($conn, $sql)) {
            echo "<p>Cadastro realizado com sucesso!</p>";
            echo "<a href='cadastro_pecas.php'>Voltar para o cadastro</a>";
        } else {
            echo "Erro: " . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
} else {
    echo "<p>Método de requisição inválido.</p>";
    echo "<a href='cadastro_pecas.php'>Voltar para o cadastro</a>";
}
?>
