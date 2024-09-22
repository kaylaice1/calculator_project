<?php
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input1 = $_POST['input1'];
    $input2 = $_POST['input2'];
    $operation = $_POST['operation'];

    switch ($operation) {
        case 'add':
            $result = $input1 + $input2;
            break;
        case 'subtract':
            $result = $input1 - $input2;
            break;
        case 'multiply':
            $result = $input1 * $input2;
            break;
        case 'divide':
            $result = $input2 != 0 ? $input1 / $input2 : 'Error: Division by zero';
            break;
    }

    // Log to history table
    $stmt = $pdo->prepare("INSERT INTO history (operation_id, input1, input2) VALUES (?, ?, ?)");
    $stmt->execute([1, $input1, $input2]); // Assume operation_id 1 for example

    echo '<h1>Result</h1>';
    
    echo "Result: " . $result;

    echo '<br><br><a href="index.php"><button>Back</button></a>';
}
?>
