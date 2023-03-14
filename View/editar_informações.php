<?php require_once("./Model/ConexaoBanco.php") ?>

<?php

if(isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $genero = $_POST['genero'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $complemento = $_POST['complemento'];

    $sql = "UPDATE tbl_cliente SET nome='$nome', data_nascimento='$data_nascimento', genero='$genero', email='$email', telefone='$telefone', cep='$cep', complemento='$complemento' WHERE id='$id'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $data_nascimento, $genero, $email, $telefone, $cep, $complemento, $id]);

    exit;

 }
?>