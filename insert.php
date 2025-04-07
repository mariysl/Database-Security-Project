<?php
$servername = "localhost";
$username = "root";
$password = ""; // Default XAMPP has no password
$dbname = "school_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birth_date = $_POST['birth_date'];
    $grade = $_POST['grade'];
    
    $stmt = $conn->prepare("INSERT INTO students (first_name, last_name, birth_date, grade) 
                           VALUES (:first_name, :last_name, :birth_date, :grade)");
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':birth_date', $birth_date);
    $stmt->bindParam(':grade', $grade);
    
    $stmt->execute();
    
    echo "New student added successfully!";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>