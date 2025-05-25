<?php
session_start();
include("db.php");

if (isset($_POST["signup"])) {
    // print_r($_POST);
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];


    $user = $conn->prepare("INSERT INTO users (username, email, password, address)
    values ('$username', '$email', '$password', '$address')  ");

    $result = $user->execute();

    if ($result) {
        // echo "New User Registered SuccessFully !!!...";
        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user->insert_id];
        header("location: /code step by step/discuss2");
        exit();
    }
} elseif (isset($_POST["login"])) {
    $password = $_POST["password"];
    $email = $_POST["email"];
    $username = "";
    $user_id = -1;
    $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        foreach ($result as $row) {
            $username = $row['username'];
            $user_id = $row["id"];
        }
        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user_id];
        header("location: /code step by step/discuss2");
        exit();
    }
} elseif (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location: /code step by step/discuss2");
    exit();
} elseif (isset($_POST["ask"])) {
    // print_r($_POST);
    // print_r($_SESSION);
    $title = $_POST['title'];
    $description = $_POST['description'];
    $catagory_id = $_POST['catagory'];
    $user_id = $_SESSION['user']['user_id'];
    $sql = "INSERT INTO `questions`(`id`, `title`, `description`, `catagory_id`, `user_id`) VALUES (NULL,'$title','$description','$catagory_id','$user_id')";
    $result = $conn->query($sql);
    if ($result) {
    //   echo"Question inserted Successfully !!!";
      header("location: /code step by step/discuss2");
      exit();
    }
}elseif (isset($_POST["answer"])) {
    $Q_id = $_POST['Q_id'];
    $ans = $_POST['answer'];
    $user_id = $_SESSION['user']['user_id'];
    $sql = "INSERT INTO `answers`(`id`, `answer`, `Q_id`, `user_id`) VALUES (NULL,'$ans','$Q_id','$user_id')";
    $result = $conn->query($sql);
    if ($result) {
    //   echo"Question inserted Successfully !!!";
      header("location: /code step by step/discuss2?Q_id=$Q_id");
      exit();
    }
}
?>