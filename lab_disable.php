<?php
    try {
        $connect = new PDO("mysql:host=localhost;dbname=pdo", "root", "");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query = "ALTER TABLE test_name ADD COLUMN is_disabled BOOLEAN DEFAULT FALSE;
";
    
        $statement = $connect->prepare($query);
        $statement->execute();
    
        echo "Table created successfully";
    } catch (PDOException $e) {
        echo "Error creating table: " . $e->getMessage();
    }
    
?>