<?php
include 'config.php'; // Include the database connection

// SQL to insert dummy data
$sql = "INSERT INTO `payment` (`caseno`, `prev_amt`, `present_amt`, `paid_amt`, `future_amt`) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

// Insert dummy data
for ($i = 1; $i <= 10; $i++) {
    $caseno = 50 + $i;          // Example case number
    $prev_amt = rand(100, 500);   // Random previous amount
    $present_amt = rand(100, 500); // Random present amount
    $paid_amt = rand(100, 500);    // Random paid amount
    $future_amt = rand(100, 500);  // Random future amount

    $stmt->bind_param("iiiii", $caseno, $prev_amt, $present_amt, $paid_amt, $future_amt);

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    } else {
        echo "New record inserted successfully\n";
    }
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
