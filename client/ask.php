<?php
/**
 * This file provides a form for users to ask a new question.
 * It includes fields for question title, description, and category selection.
 */
?>
<div class="container">
    <h1 class="heading mt-5 mt-5"> Ask A Question </h1>

    <!-- Form to submit a new question.
         The form data will be sent to './server/requests.php' using the POST method. -->
    <form method="post" action="./server/requests.php">

        <div class="mb-3">
            <label for="title" class="form-label bold">Title</label>
            <input type="text" class="form-control" id="title" name="title"  placeholder="Enter your Question Title " required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label bold">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Describe Your Question" required></textarea>
        </div>
        <div class="mb-3">
            <label for="catagory" class="form-label bold">Category</label>
            <?php
            // Include the 'catagory.php' file, which likely contains the dropdown for category selection.
            include("catagory.php");
            ?>
        </div>

        <button type="submit" class="btn btn-primary bold mt-5" name="ask">Ask Question</button>
    </form>
</div>
