<div class="container">
    <h1 class="heading margin-bottom-15  margin-top-15 "> Question Page </h1>
    <?php
    include("./server/db.php");
    $sql = "select * from questions where id = '$Q_id'";
    $result = $conn->query($sql);
    if ($result) {
        $i = 0;
        foreach ($result as $row) {
            // print_r($row);
            $i++;
            $title = ucfirst($row['title']);
            $desc = ucfirst($row['description']);
            echo "<div class='question-container'>
                <h4><u>Question:</u> $title </h4>
                <p><b>Description:</b> $desc </p>
            </div>";

        }
    }
    include("answers.php");
    ?>

    <form action="./server/requests.php" method="post">
        <input type="hidden" name="Q_id" value="<?php echo $Q_id; ?>">
        <textarea required rows="8" name="answer" id="" class="form-control margin-bottom-15 margin-top-15"
            placeholder="Your Answer..."></textarea>
        <button type="submit" class="btn btn-primary bold  margin-bottom-15 margin-top-15" >Write
            Your
            Answer</button>
    </form>


</div>