<?php
                                            $conn = new mysqli("localhost", "root", "", "pdo");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$lab = $_POST['lab'];
$date = date('Y-m-d');

$sql = "INSERT INTO test_name (lab, date) VALUES ('$lab', '$date')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'id' => $conn->insert_id, 'date' => $date]);
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>
