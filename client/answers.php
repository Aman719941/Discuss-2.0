<div class="">
    <h4 class=""><u>Answers:</u> </h4>
    <?php
        $sql = "select * from answers where Q_id = $Q_id";
        $result = $conn->query($sql);
        if ($result) {
        $i = 0;
        foreach ($result as $row) {
            $i++;
            $ans = ucfirst($row["answer"]);
            ?>

            <ul type="none">
                <li>
                    <?php echo $i . ") " . $ans . "<br>"; ?>
                </li>
            </ul>
            <?php
        }
    }
    ?>

</div>