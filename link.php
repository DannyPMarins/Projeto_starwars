<?php
// Informações de conexão (substitua pelos seus dados)
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$database = "seu_banco_de_dados";

// Criar conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
} else {
    echo "Conectado com sucesso!";
}

// Exemplo de consulta simples
$sql = "SELECT * FROM sua_tabela";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Exibir resultados
    while($row = mysqli_fetch_assoc($result)) {
        echo "<br> id: " . $row["id"]. " - Nome: " . $row["nome"]. " " . $row["sobrenome"];
    }
} else {
    echo "0 resultados";
}

mysqli_close($conn);
?>