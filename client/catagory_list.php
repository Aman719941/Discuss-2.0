<?php
/**
 * This file displays a list of categories from the database in a table format.
 * It allows users to filter questions by clicking on a category.
 */
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="heading mb-3 mt-5"> Categories </h1>
            <?php
            // Include the database connection file.
            include("./server/db.php");

            // SQL query to select all categories from the 'catagory' table.
            $sql = "SELECT * FROM `catagory`";
            // Execute the query.
            $result = $conn->query($sql);
            ?>
            <table class="table table-success table-striped table-hover text-center table-dark">
                <thead>
                    <tr>
                        <th scope="col" style='font-size:25px'>#</th>
                        <th scope="col" style='font-size:25px'>Category_Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are any categories returned from the query.
                    if ($result->num_rows > 0) {
                        $i = 0; // Initialize counter for row numbering.
                        // Loop through each row (category) in the result set.
                        foreach ($result as $row) {
                            $i++; // Increment counter.
                            $catagory_name = ucfirst($row['name']); // Get category name and capitalize the first letter.
                            $catagory_id = $row['id']; // Get category ID.

                            // Output a table row with category number and a link to filter by category.
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td><a href='?cat_id=$catagory_id' style='font-size:20px' class='link-success'>$catagory_name</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        // If no categories are found, display a message.
                        echo "<tr><td colspan='2'>No categories found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
