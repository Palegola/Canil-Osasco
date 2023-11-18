<?php

header("Location:../html/agradecimentovolunt.html");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canilosasco";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

    $nome = $_POST['Nome'];
    $sobrenome = $_POST['Sobrenome'];
    $CPF = $_POST['CPF'];
    $Email = $_POST['Email'];
    $Celular = $_POST['Celular'];
    $CEP = $_POST['CEP'];
    $End = $_POST['Endereco'];
    $Num = $_POST['Numero'];
    $Cidade = $_POST['Cidade'];
    $Estado = $_POST['Estado'];
    $DataNascimento = $_POST['DataNasc'];
    $Genero = $_POST['Genero'];


    echo("$nome,$sobrenome, $CPF,$Email,$Celular, $CEP, $End, $Num, $Cidade,$Estado, $DataNascimento, $Genero");

// commando pra mandar os dados pro banco
 $sql = "INSERT INTO precadvolunt (Nome, Sobrenome, CPF, Email, Celular, CEP, Endereco, Numero, Cidade,Estado, DataNasc, Genero)
 VALUES ('$nome','$sobrenome','$CPF','$Email','$Celular','$CEP', '$End','$Num','$Cidade','$Estado','$DataNascimento', '$Genero')";

if ($conn->query($sql) === TRUE) {
    echo "Dados do formulário inseridos com sucesso.";
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}

// Feche a conexão com o banco de dados
$conn->close();


?>
