<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discuss_2.0</title>
    <?php include("./client/common.php"); ?>
</head>

<body>
    
    <?php
    session_start();
    include "./client/header.php";

    // At the top, after session_start()
    if (isset($_SESSION['user']['username'])) {
        // User is logged in, redirect them if they try to access login/signup directly
        if (isset($_GET["signup"]) || isset($_GET["login"])) {
            header("location: /code step by step/discuss2/"); // Or wherever your main logged-in page is
            exit(); // Always exit after a header redirect
        }
    }

    // Then your existing code block 
    if (isset($_GET["signup"])) { // No need to check !$_SESSION['user']['username'] here if handled above
        include "./client/signup.php";
    } elseif (isset($_GET["login"])) { // Same here
        include "./client/login.php";
    } elseif (isset($_GET["ask"])) {
        include "./client/ask.php";
    } elseif (isset($_GET["logo"])) {
        include("./client/home.php");
    } elseif (isset($_GET['catagory'])) {
        include("./client/catagory.php");
    } elseif (isset($_GET['latest_questions'])) {
        include("./client/latest_questions.php");
    } elseif (isset($_GET['about_me'])) {
        include("./client/about_me.php");
    } elseif (isset($_GET['portfolio'])) {
        include("./client/portfolio.php");
    } elseif (isset($_GET['my_blog'])) {
        include("./client/my_blog.php");
    } elseif (isset($_GET['Q_id'])) {
        $Q_id = $_GET['Q_id'];
        include("./client/question.php");
    } else {
        include "./client/home.php";
    }

    ?>

<?php 
// include("./client/footer.php");
 ?>
</body>

</html>