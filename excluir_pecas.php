<?php
include 'conexao.php';

if (isset($_GET['pec_codigo'])) {
    $pec_codigo = mysqli_real_escape_string($conn, $_GET['pec_codigo']);

    $sql = "DELETE FROM Pecas WHERE pec_codigo='$pec_codigo'";

    if (mysqli_query($conn, $sql)) {
        echo "<p>Peça excluída com sucesso!</p>";
        echo "<a href='cadastro_pecas.php'>Voltar para o cadastro</a>";
    } else {
        echo "Erro: " . mysqli_error($conn);
    }
} else {
    echo "<p>Peça não encontrada.</p>";
}

mysqli_close($conn);
?>
