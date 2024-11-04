<?php
// Configuração do banco de dados
$servername = "192.168.18.85";
$username = "root";
$password = "root";
$dbname = "1s8";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
	die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Coletar dados do formulário
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$telefone = $_POST["telefone"];
	$mensagem = $_POST["mensagem"];
	
	// Inserir dados no banco de dados
	$sql = "INSERT INTO dados (nome, email, telefone, mensagem) VALUES ('$nome', '$email', '$telefone', '$mensagem')";
	
	if ($conn->query($sql) === TRUE) {
		echo "Dados enviados com sucesso!";
	} else {
		echo "Erro ao enviar dados: " . $conn->error;
	}
	
	// Fechar conexão
	$conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulário de Coleta de Dados</title>
</head>
<body>
	<form action="untitled.php" method="post">
		<label for="nome">Nome:</label>
		<input type="text" id="nome" name="nome"><br><br>
		<label for="email">E-mail:</label>
		<input type="email" id="email" name="email"><br><br>
		<label for="telefone">Telefone:</label>
		<input type="text" id="telefone" name="telefone"><br><br>
		<label for="mensagem">Mensagem:</label>
		<textarea id="mensagem" name="mensagem"></textarea><br><br>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>