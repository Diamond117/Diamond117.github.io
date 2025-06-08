<?php
    include 'config.php'; 
        
    $conn = mysqli_connect("classmysql.engr.oregonstate.edu", "cs340_wolfemax", "3991", "cs340_wolfemax");
    if (!$conn) {
        die('Could not connect: ' . mysqli_error());
    }

// ---- Handle Button Action ----
$action = $_POST['action'] ?? null;

switch ($action) {
    case 'upload':
        $stmt = $pdo->prepare("INSERT INTO your_table (column1, column2) VALUES (?, ?)");
        $stmt->execute(['value1', 'value2']);
        echo "Uploaded";
        break;

    case 'download':
        $stmt = $pdo->prepare("DELETE FROM your_table WHERE id = ?");
        $stmt->execute([1]); // Replace 1 with dynamic value
        echo "Downloaded";
        break;

    default:
        echo "No valid action selected.";
}
?>
