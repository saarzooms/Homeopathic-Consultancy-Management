<?php
                                            $conn = new mysqli("localhost", "root", "", "pdo");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$action = $_POST['action'];
$is_disabled = $action === 'disable' ? 1 : 0;
$newStatus = $action === 'disable' ? 'Enable' : 'Disable';

$sql = "UPDATE test_name SET is_disabled = $is_disabled WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'newStatus' => $newStatus]);
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>
