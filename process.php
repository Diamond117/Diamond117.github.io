<?php
    include 'config.php'; 
        
    $conn = mysqli_connect("classmysql.engr.oregonstate.edu", "cs340_wolfemax", "3991", "Conversion");
    if (!$conn) {
        die('Could not connect: ' . mysqli_error());
    }
    $result = mysqli_query($conn, "SHOW TABLES");
	if (!$result) {
		die("Query to show fields from table failed");
	}
	$num_row = mysqli_num_rows($result);	
	
	echo "<h1>My Database Select a Table:<h1>"; 

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
