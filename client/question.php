<?php
/**
 * This file displays a specific question and its answers.
 * It also provides a form for users to submit new answers and lists similar questions.
 */
?>
<div class="container">
    <div class="row">
        <div class="col-7">
            <h1 class="heading mb-5 mt-5"> Question Page </h1>
            <?php
            // Include the database connection file.
            include("./server/db.php");

            // Ensure Q_id is set and sanitized to prevent SQL injection.
            // intval() is used to ensure the ID is an integer.
            $Q_id = isset($_GET['Q_id']) ? intval($_GET['Q_id']) : 0; // Assuming Q_id comes from GET.

            // SQL query to fetch the specific question details based on Q_id.
            $sql = "select * from questions where id = '$Q_id'";
            // Execute the query.
            $result = $conn->query($sql);

            // Check if the query was successful and if a question was found.
            if ($result && $result->num_rows > 0) {
                // Loop through the result (should only be one row for a specific ID).
                foreach ($result as $row) {
                    $title = ucfirst($row['title']); // Get question title and capitalize.
                    $desc = ucfirst($row['description']); // Get question description and capitalize.

                    // Display the question title and description.
                    echo "<div class='question-container'>
                        <h4><u>Question:</u> $title </h4>
                        <p><b>Description:</b> $desc </p>
                    </div>";
                }
            } else {
                // Handle case where question ID doesn't exist or query failed.
                echo "<p>Question not found.</p>";
            }
            // Include the file that displays answers for the current question.
            include("answers.php");
            ?>

            <!-- Form to submit an answer to the current question.
                 The form data will be sent to './server/requests.php' using the POST method. -->
            <form action="./server/requests.php" method="post">
                <input type="hidden" name="Q_id" value="<?php echo $Q_id; ?>">
                <textarea required rows="8" name="answer" id="" class="form-control mt-5"
                    placeholder="Your Answer..."></textarea>
                <button type="submit" class="btn btn-primary bold mt-5">Write Your Answer</button>
            </form>
        </div>

        <div class="col-4">
            <h1 class="heading mb-5 mt-5"> Similar Questions </h1>
            <table class="table table-success table-striped table-hover text-center table-dark">
                <thead>
                    <tr>
                        <th scope="col" style='font-size:25px'>#</th>
                        <?php
                        $cat_name = "Category"; // Default category name.
                        $cat_id = 0; // Default category ID.

                        // Fetch the category ID of the current question.
                        $sql = "select catagory_id from questions where id = '$Q_id'";
                        $result = $conn->query($sql);
                        if ($result && $result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $cat_id = $row['catagory_id'];

                            // Fetch the category name using the fetched category ID.
                            $sql = "select name from catagory where id = '$cat_id'";
                            $result = $conn->query($sql);
                            if ($result && $result->num_rows > 0) {
                                $cat_name = $result->fetch_assoc()["name"];
                            }
                        }
                        ?>
                        <th scope="col" style='font-size:25px'><?php echo $cat_name; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // SQL query to select up to 5 similar questions from the same category,
                        // excluding the current question itself.
                        $sql = "select id, title from questions where catagory_id = '$cat_id' AND id != '$Q_id' LIMIT 5";
                        $result = $conn->query($sql);

                        // Check if similar questions are found.
                        if ($result && $result->num_rows > 0) {
                            $i = 0; // Initialize counter for numbering similar questions.
                            // Loop through each similar question.
                            foreach ($result as $row) {
                                $i++; // Increment counter.
                                $similar_q_id = $row['id']; // Get the ID of the similar question.
                                $title = ucfirst($row['title']); // Get the title of the similar question and capitalize.

                                // Output a table row with the similar question number and a link to it.
                                echo "<tr>";
                                echo "<td>".$i."</td>";
                                echo "<td style='text-align:left'><a style='font-size:20px' class='link-success' href='?Q_id=" . $similar_q_id . "'>".$title."</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            // If no similar questions are found, display a message.
                            echo "<tr><td colspan='2'>No similar questions found.</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
