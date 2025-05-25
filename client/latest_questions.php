<div class="container">
    <h1 class="heading margin-bottom-15 margin-top-15"> Latest Questions </h1>
    <?php
    include("./server/db.php");
    $sql = "SELECT * FROM `questions`";
    $result = $conn->query($sql);
    // print_r($result);
    $i = 0;
    ?>
    <table class="table table-success table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Q_id</th>
                <th scope="col">Q_title</th>
                <th scope="col">Q_description</th>
                <th scope="col">Catagory_Name</th>
                <th scope="col">User_Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                foreach ($result as $row) {
                    // print_r($row);
                    $i++;
                    $Q_title = ucfirst($row['title']);
                    $Q_desc = ucfirst($row['description']);
                    $user_id = $row['user_id'];
                    $catagory_id = $row['catagory_id'];

                    // fetching username via user_id                        
                    $sql = $conn->prepare("select username from users where id = '$user_id'");
                    $sql->execute();
                    $result = $sql->get_result();
                    if ($result) {
                        $row = $result->fetch_assoc();
                        $user = ucfirst($row['username']);
                    }
                    // fetching catagory_name via catagory_id                        
                    $sql = $conn->prepare("select name from catagory where id = '$catagory_id'");
                    $sql->execute();
                    $result = $sql->get_result();
                    if ($result) {
                        $row = $result->fetch_assoc();
                        $catagory_name = ucfirst($row['name']);
                    }

                    echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td>$Q_title</td>";
                    echo "<td>$Q_desc</td>";
                    echo "<td>$catagory_name</td>";
                    echo "<td>$user</td>";
                    echo "</tr>";
                }
            }
            ?>

        </tbody>


    </table>
</div>