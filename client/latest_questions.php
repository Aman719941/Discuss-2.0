<?php
/**
 * This file displays a list of the latest questions asked on the platform.
 * It fetches questions from the database and shows their title, description,
 * category, and the user who asked them.
 */
?>
<div class="container">
    <h1 class="heading mb-3 mt-5"> Latest Questions </h1>
    <?php
    // Include the database connection file.
    include("./server/db.php");
    // SQL query to select all questions from the 'questions' table.
    $sql = "SELECT * FROM `questions` ORDER BY id DESC"; // Added ORDER BY to truly get "latest" questions.
    // Execute the query.
    $result = $conn->query($sql);
    $i = 0; // Initialize counter for row numbering.
    ?>
    <table class="table table-success table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th> <th scope="col">Q_title</th>
                <th scope="col">Q_description</th>
                <th scope="col">Category_Name</th>
                <th scope="col">User_Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if there are any questions returned from the query.
            if ($result->num_rows > 0) {
                // Loop through each row (question) in the result set.
                foreach ($result as $row) {
                    $i++; // Increment counter.
                    $Q_title = ucfirst($row['title']); // Get question title and capitalize.
                    $Q_desc = ucfirst($row['description']); // Get question description and capitalize.
                    $user_id = $row['user_id']; // Get user ID who asked the question.
                    $catagory_id = $row['catagory_id']; // Get category ID of the question.

                    // Fetch username from the 'users' table using user_id.
                    // Using prepared statements for security.
                    $sql_user = $conn->prepare("select username from users where id = ?");
                    $sql_user->bind_param("i", $user_id); // Bind parameter.
                    $sql_user->execute();
                    $result_user = $sql_user->get_result();
                    $user = "Unknown"; // Default user name.
                    if ($result_user && $result_user->num_rows > 0) {
                        $row_user = $result_user->fetch_assoc();
                        $user = ucfirst($row_user['username']); // Get username and capitalize.
                    }
                    $sql_user->close(); // Close the prepared statement.

                    // Fetch category name from the 'catagory' table using catagory_id.
                    // Using prepared statements for security.
                    $sql_catagory = $conn->prepare("select name from catagory where id = ?");
                    $sql_catagory->bind_param("i", $catagory_id); // Bind parameter.
                    $sql_catagory->execute();
                    $result_catagory = $sql_catagory->get_result();
                    $catagory_name = "Unknown"; // Default category name.
                    if ($result_catagory && $result_catagory->num_rows > 0) {
                        $row_catagory = $result_catagory->fetch_assoc();
                        $catagory_name = ucfirst($row_catagory['name']); // Get category name and capitalize.
                    }
                    $sql_catagory->close(); // Close the prepared statement.

                    // Output a table row with question details.
                    echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td>$Q_title</td>";
                    echo "<td>$Q_desc</td>";
                    echo "<td>$catagory_name</td>";
                    echo "<td>$user</td>";
                    echo "</tr>";
                }
            } else {
                // If no questions are found, display a message.
                echo "<tr><td colspan='5'>No latest questions found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
