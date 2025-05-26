<?php
/**
 * This file serves as the home page, displaying a list of questions.
 * It allows filtering questions by category and shows details like title, description,
 * category name, and the user who asked the question.
 */
?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="heading mb-3  mt-5 "> Home Page </h1>
            <?php
            // Include the database connection file.
            include("./server/db.php");

            // Check if a category ID is set in the request to filter questions.
            if (isset($_REQUEST['cat_id'])) {
                $cat_id = $_REQUEST['cat_id']; // Get the category ID.
                $sql = "SELECT * FROM `questions` where catagory_id = $cat_id"; // SQL to fetch questions by category.
            } else {
                $sql = "SELECT * FROM `questions`"; // SQL to fetch all questions if no category is specified.
            }
            // Execute the SQL query.
            $result = $conn->query($sql);
            $i = 0; // Initialize counter for row numbering.
            ?>
            <table class="table table-success table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col" style='font-size:25px'>#</th>
                        <th scope="col" style='font-size:25px'>Q_title</th>
                        <th scope="col" style='font-size:25px'>Q_description</th>
                        <th scope="col" style='font-size:25px'>Category_Name</th>
                        <th scope="col" style='font-size:25px'>User_Name</th>
                        <th scope="col" style='font-size:25px'>Action</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                    // IMPORTANT FIX: Check if the query was successful ($result is not false)
                    // before attempting to access num_rows.
                    if ($result && $result->num_rows > 0) {
                        // Loop through each row (question) in the result set.
                        foreach ($result as $row) {
                            $i++; // Increment counter.
                            $Q_id = $row['id']; // Get question ID.
                            $Q_title = ucfirst($row['title']); // Get question title and capitalize.
                            $Q_desc = ucfirst($row['description']); // Get question description and capitalize.
                            $user_id = $row['user_id']; // Get user ID who asked the question.
                            $catagory_id = $row['catagory_id']; // Get category ID of the question.

                            // Fetch username from the 'users' table using user_id.
                            $sql_user = $conn->prepare("select username from users where id = ?");
                            $sql_user->bind_param("i", $user_id); // Bind parameter to prevent SQL injection.
                            $sql_user->execute();
                            $result_user = $sql_user->get_result();
                            $user = "Unknown"; // Default user name.
                            if ($result_user && $result_user->num_rows > 0) {
                                $row_user = $result_user->fetch_assoc();
                                $user = ucfirst($row_user['username']); // Get username and capitalize.
                            }
                            $sql_user->close(); // Close the prepared statement.

                            // Fetch category name from the 'catagory' table using catagory_id.
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

                            // Output a table row with question details and an action button.
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>$Q_title</td>";
                            echo "<td>$Q_desc</td>";
                            echo "<td>$catagory_name</td>";
                            echo "<td>$user</td>";
                            echo "<td><a href='?Q_id=$Q_id' class='btn btn-primary bold'>Show / Submit Another Response</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        // If no questions are found or query failed, display a message.
                        echo "<tr><td colspan='6'>No questions found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="col-3">
            <?php
            // Include the category list sidebar.
            include("catagory_list.php");
            ?>
        </div>
    </div>
</div>
