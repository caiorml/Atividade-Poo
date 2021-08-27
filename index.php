<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gestão acadêmica</title>
</head>
<body>
    <?php
    require './Pessoa.php';
    require './Estudante.php';
    require './Professor.php';
    ?>
    
    
    
    <br><hr>
    
    <h2> Professores </h2>
    <?php
        $conexao = new Conn();
        $professores = $conexao->listarProfessores();
        foreach ($professores as $key => $value) {
            echo $value['nome'].' - '."<a href='editarEstudante.php?email={$value["email"]}'>Editar</a> <br>";
        }
    ?>

<br><hr>

<h2> Estudantes </h2>
    <?php
        $estudante = new Estudante('qq@qq.qq');
        $estudanteDados = $estudante->verEstudante();
        echo "Nome: {$estudanteDados->nome} <br>";
        echo "Telefone: {$estudanteDados->telefone} <br>";
        echo "Email: {$estudanteDados->email} <br>";
        echo "Idade: {$estudante->calculaIdade($estudanteDados->data_nascimento)} <br>";
        echo "Ira: {$estudanteDados->ira} <br>";
        echo "Matrícula: {$estudanteDados->matricula} <br>";
        echo "Avaliação: {$estudante->calculaAvaliacao()} <br>";
        echo "Disciplinas: {$estudante->disciplinasMatriculadas()} <br>";
        echo "Atualizar Ira: {$estudante->atualizaIRA(8)} <br>";
    ?>

</body>
</html>