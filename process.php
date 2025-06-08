<?php
// ---- Connect to DB ----
$host = 'localhost';
$db   = 'Conversion';
$user = 'cs340_wolfemax'; // or another user
$pass = '3991'; // your password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     die("DB Connection failed: " . $e->getMessage());
}

// ---- Handle Button Action ----
$action = $_POST['action'] ?? null;

switch ($action) {
    case 'upload':
        $stmt = $pdo->prepare("INSERT INTO your_table (column1, column2) VALUES (?, ?)");
        $stmt->execute(['value1', 'value2']);
        echo "Inserted!";
        break;

    case 'download':
        $stmt = $pdo->prepare("DELETE FROM your_table WHERE id = ?");
        $stmt->execute([1]); // Replace 1 with dynamic value
        echo "Deleted!";
        break;

    default:
        echo "No valid action selected.";
}
?>
