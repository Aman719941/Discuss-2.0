<?php include("./server/db.php"); ?>
<select name="catagory" id="catagory" class="form-control">
    <option value="">Select Question Catagory</option>

    <?php 
        $sql = "select * from catagory";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            foreach ($result as $row) {
                 $id = $row['id'];
                 $name = ucfirst($row['name']);
                echo"<option value=$id>$name</option>";                 
            }
        }
    ?>

</select>