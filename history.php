<?php
include 'header.php';

$stmt = $pdo->query("SELECT * FROM history");
while ($row = $stmt->fetch()) {
    echo "Operation ID: " . $row['operation_id'] . " - Inputs: " . $row['input1'] . ", " . $row['input2'] . " - Time: " . $row['timestamp'] . "<br>";
}
?>
