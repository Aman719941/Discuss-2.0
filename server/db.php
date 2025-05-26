<?php
/**
 * This file establishes a connection to the MySQL database.
 * It defines the database credentials and attempts to connect.
 * Error handling is included for connection failures.
 */

    // Database connection parameters.
    $host = "localhost";    // Database host (usually localhost for local development).
    $user = "root";         // Database username.
    $password = "";         // Database password (empty for XAMPP/WAMP default root user).
    $databse = "discuss2.0"; // Name of the database to connect to.

    // Establish a new MySQLi connection.
    $conn = mysqli_connect($host, $user, $password, $databse);

    // Check if the connection was successful.
    if (mysqli_connect_errno()) {
        // If connection failed, output the error message.
        echo  mysqli_connect_error();
    }else{
        // Optional: Uncomment the line below for a success message during development.
        // echo("connected to  Database Successfully");
    }
?>
