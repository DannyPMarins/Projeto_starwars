<?php
$dsn = 'mysql:host=localhost;dbname=starwarsfilmes';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


$sql = "INSERT INTO logs (date, solicitacao) VALUES (:date, :solicitacao)";
$stmt = $pdo->prepare($sql);

$dataHora = date("Y-m-d H:i:s");
$solicitaca = 'teste';
$stmt->bindParam(':date', $dataHora);
$stmt->bindParam(':solicitacao', $solicitaca);

$stmt->execute();

echo "Novo log criado!";
?>

