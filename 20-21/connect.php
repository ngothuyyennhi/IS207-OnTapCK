<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "qlxe";

    // Create a new mysqli connection
    $connect = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    // Check the connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
?>



<?php

// Assuming you have a database connection
// $dbHost = "localhost";
// $dbUser = "root";
// $dbPass = "";
// $dbName = "qlxe";

// $connect = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// if ($connnect->connect_error) {
//     die("Connection failed: " . $connnect->connect_error);
// }

// // Fetch customer data from the database
// $sql = "SELECT id, name FROM customers";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         echo "<tr>";
//         echo "<td>" . $row["id"] . "</td>";
//         echo "<td>" . $row["name"] . "</td>";
//         echo "<td><button onclick='deleteCustomer(" . $row["id"] . ")'>Delete</button></td>";
//         echo "</tr>";
//     }
// } else {
//     echo "<tr><td colspan='3'>No customers found</td></tr>";
// }

// $connnect->close();

?>
