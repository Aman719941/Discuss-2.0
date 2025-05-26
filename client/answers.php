<?php
/**
 * This file displays a list of answers associated with a specific question.
 * It fetches answers from the database based on the provided question ID (Q_id).
 */
?>
<div class="">
    <h4 class=""><u>Answers:</u> </h4>
    <?php
        // SQL query to select all answers for a given question ID.
        // $Q_id is expected to be defined in the context where this file is included.
        $sql = "select * from answers where Q_id = $Q_id";
        // Execute the query.
        $result = $conn->query($sql);

        // Check if the query was successful.
        if ($result) {
        $i = 0; // Initialize counter for answer numbering.
        // Loop through each row (answer) in the result set.
        foreach ($result as $row) {
            $i++; // Increment counter.
            $ans = ucfirst($row["answer"]); // Get the answer text and capitalize the first letter.
            ?>

            <ul type="none">
                <li>
                    <?php
                    // Display the answer with its number.
                    echo $i . ") " . $ans . "<br>";
                    ?>
                </li>
            </ul>
            <?php
        }
    } else {
        // Optional: Add an else block here to handle cases where the query fails, e.g., echo "Error fetching answers.";
    }
    ?>

</div>
