<?php
/**
 * This file generates a dynamic dropdown (select) list of categories from the database.
 * It is typically included in forms where a user needs to select a category for a question or other item.
 */

// Include the database connection file.
include("./server/db.php");
?>
<select name="catagory" id="catagory" class="form-control">
    <option value="">Select Question Category</option>

    <?php
        // SQL query to select all categories from the 'catagory' table.
        $sql = "select * from catagory";
        // Execute the query.
        $result = $conn->query($sql);

        // Check if there are any categories returned from the query.
        if ($result->num_rows > 0) {
            // Loop through each row (category) in the result set.
            foreach ($result as $row) {
                 $id = $row['id']; // Get category ID.
                 $name = ucfirst($row['name']); // Get category name and capitalize the first letter.
                // Output an <option> tag for each category. The 'value' is the category ID, and the displayed text is the category name.
                echo"<option value=$id>$name</option>";
            }
        } else {
            // Optional: Add a default option or message if no categories are found.
            // echo "<option value=''>No categories available</option>";
        }
    ?>

</select>
