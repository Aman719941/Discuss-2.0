<?php
/**
 * This script handles various user requests including signup, login, logout,
 * asking questions, and submitting answers.
 * It interacts with the database to perform these operations.
 */

// Start the PHP session to manage user login state.
session_start();
// Include the database connection file.
include("db.php");

// Handle user signup request.
if (isset($_POST["signup"])) {
    // Retrieve user data from the POST request.
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    // Prepare an SQL statement to insert new user data into the 'users' table.
    // Using a prepared statement helps prevent SQL injection.
    $user = $conn->prepare("INSERT INTO users (username, email, password, address) VALUES (?, ?, ?, ?)");
    // Bind parameters to the prepared statement. 'ssss' indicates four string parameters.
    $user->bind_param("ssss", $username, $email, $password, $address);
    // Execute the prepared statement.
    $result = $user->execute();

    // Check if the insertion was successful.
    if ($result) {
        // Set session variables for the newly registered user.
        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user->insert_id];
        // Redirect to the home page after successful signup.
        header("location: /code step by step/Discuss-2.0");
        exit(); // Exit to prevent further script execution.
    } else {
        // Optional: Handle signup failure (e.g., display an error message).
        // echo "Error: " . $conn->error;
    }
    $user->close(); // Close the prepared statement.

// Handle user login request.
} elseif (isset($_POST["login"])) {
    // Retrieve email and password from the POST request.
    $password = $_POST["password"];
    $email = $_POST["email"];
    $username = ""; // Initialize username.
    $user_id = -1; // Initialize user ID.

    // Prepare an SQL statement to select user data for login.
    $sql = "SELECT * FROM `users` WHERE `email` = ? AND `password` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password); // Bind parameters.
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if exactly one user was found with the provided credentials.
    if ($result->num_rows == 1) {
        // Fetch the user data.
        foreach ($result as $row) {
            $username = $row['username'];
            $user_id = $row["id"];
        }
        // Set session variables for the logged-in user.
        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user_id];
        // Redirect to the home page after successful login.
        header("location: /code step by step/Discuss-2.0");
        exit(); // Exit to prevent further script execution.
    } else {
        // Optional: Handle login failure (e.g., display an error message or redirect with status).
        // header("location: /code step by step/Discuss-2.0?login_status=failed");
        // exit();
    }
    $stmt->close(); // Close the prepared statement.

// Handle user logout request.
} elseif (isset($_GET['logout'])) {
    // Unset all session variables.
    session_unset();
    // Destroy the session.
    session_destroy();
    // Redirect to the home page after logout.
    header("location: /code step by step/Discuss-2.0");
    exit(); // Exit to prevent further script execution.

// Handle "ask a question" request.
} elseif (isset($_POST["ask"])) {
    // Retrieve question details from the POST request.
    $title = $_POST['title'];
    $description = $_POST['description'];
    $catagory_id = $_POST['catagory'];
    $user_id = $_SESSION['user']['user_id']; // Get user ID from session.

    // Prepare an SQL statement to insert a new question.
    $sql = "INSERT INTO `questions`(`id`, `title`, `description`, `catagory_id`, `user_id`) VALUES (NULL, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $title, $description, $catagory_id, $user_id); // Bind parameters.
    $result = $stmt->execute();

    // Check if the question was inserted successfully.
    if ($result) {
      // Redirect to the home page after successfully asking a question.
      header("location: /code step by step/Discuss-2.0");
      exit(); // Exit to prevent further script execution.
    } else {
        // Optional: Handle question insertion failure.
        // echo "Error: " . $conn->error;
    }
    $stmt->close(); // Close the prepared statement.

// Handle "submit answer" request.
} elseif (isset($_POST["answer"])) {
    // Retrieve answer details from the POST request.
    $Q_id = $_POST['Q_id']; // Question ID to which the answer belongs.
    $ans = $_POST['answer']; // The answer text.
    $user_id = $_SESSION['user']['user_id']; // Get user ID from session.

    // Prepare an SQL statement to insert a new answer.
    $sql = "INSERT INTO `answers`(`id`, `answer`, `Q_id`, `user_id`) VALUES (NULL, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $ans, $Q_id, $user_id); // Bind parameters.
    $result = $stmt->execute();

    // Check if the answer was inserted successfully.
    if ($result) {
      // Redirect back to the question page after submitting an answer.
      header("location: /code step by step/Discuss-2.0?Q_id=$Q_id");
      exit(); // Exit to prevent further script execution.
    } else {
        // Optional: Handle answer insertion failure.
        // echo "Error: " . $conn->error;
    }
    $stmt->close(); // Close the prepared statement.
}
?>
