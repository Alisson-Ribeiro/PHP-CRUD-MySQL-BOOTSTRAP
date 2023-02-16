<?php
include "db_conn.php";
$id = $_GET['id'];

// Evita ataques de injeção de SQL
$id = mysqli_real_escape_string($conn, $id);

$sql = "DELETE FROM `crud` WHERE id = $id";

$result = mysqli_query($conn, $sql);

if($result){
    // Redireciona para a página de listagem após excluir com sucesso
    header("Location: index.php?msg=Record deleted successfully");
} else {
    // Caso ocorra algum erro, exibe a mensagem de erro do MySQL
    echo "Failed: " . mysqli_error($conn);
}
?>
