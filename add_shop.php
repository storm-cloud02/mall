<?php
// Database connection
$connection = new mysqli("localhost", "root", "", "mallmanagementsystem");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand = $_POST['brand'];
    $rent = $_POST['rent'];
    $manager = $_POST['manager'];
    $shop_number = $_POST['shop_number'];
    $phone = $_POST['phone'];
    $renting_date = $_POST['renting_date'];

    $sql = "INSERT INTO shops (brand, rent, manager, shop_number, phone, renting_date) 
            VALUES ('$brand', '$rent', '$manager', '$shop_number', '$phone', '$renting_date')";

    if ($connection->query($sql) === TRUE) {
        header("Location: shops.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Close connection
$connection->close();
?>
