<?php
// Database connection
$connection = new mysqli("localhost", "root", "", "mallmanagementsystem");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve shop data
$sql = "SELECT * FROM shops";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Shop Information</title>
</head>
<body>
    <h1>Shop Information</h1>
    <a href="add_shop.html">Add New Shop</a>
    <table>
        <tr>
            <th>Shop ID</th>
            <th>Brand</th>
            <th>Rent</th>
            <th>Manager</th>
            <th>Shop Number</th>
            <th>Phone</th>
            <th>Renting Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['brand']}</td>
                        <td>{$row['rent']}</td>
                        <td>{$row['manager']}</td>
                        <td>{$row['shop_number']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['renting_date']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No shops found.</td></tr>";
        }
        $connection->close();
        ?>
    </table>
</body>
</html>
