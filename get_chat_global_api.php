<?php

require_once "database.php";

$query = "SELECT * FROM chat_global";
$stmt = $db->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');

echo json_encode($result);

?>