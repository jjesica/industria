<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pec_codigo = mysqli_real_escape_string($conn, $_POST['pec_codigo']);
    $numero = mysqli_real_escape_string($conn, $_POST['numero']);
    $peso = mysqli_real_escape_string($conn, $_POST['peso']);
    $cor = mysqli_real_escape_string($conn, $_POST['cor']);

    $sql = "UPDATE Pecas SET numero='$numero', peso='$peso', cor='$cor' WHERE pec_codigo='$pec_codigo'";

    if (mysqli_query($conn, $sql)) {
        echo "<p>Peça atualizada com sucesso!</p>";
        echo "<a href='cadastro_pecas.php'>Voltar para o cadastro</a>";
    } else {
        echo "Erro: " . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    echo "<p>Método de requisição inválido.</p>";
    echo "<a href='cadastro_pecas.php'>Voltar para o cadastro</a>";
}
?>
