<?php include_once('../banco-de-dados/conexao.php'); 

session_start();
if ((!isset($_SESSION['email_admin']) == true) && (!isset($_SESSION['senha_admin']) == true)) {
    unset($_SESSION['email_admin']);
    unset($_SESSION['senha_admin']);
    header('location:login.php');
}

$ID_PROJETO = $_GET['ID'];

if (isset($ID_PROJETO)) {
    $sql = "DELETE FROM `projetos` WHERE `id_projeto` = '$ID_PROJETO'";
    
    if(mysqli_query($conn, $sql)){
        $resultado = mysqli_query($conn, $sql);
    } else {
        echo "Error: " . $resultado . "<br>" . mysqli_error($conn);
    }

    if (mysqli_num_rows($resultado) <= 0) {
        // retorna se deletado com sucesso
        echo "<script>window.location.href='listar.php'</script>";
    }
} else {
    // Retorna a listagem se caso ocorra da pessoa digitar o endereço (http://localhost/deletar.php?id=1) sem o (?id=1)
    echo "<script>alert('Página invalida')</script>";
    echo "<script>window.location.href='listar.php'</script>";
}

?>