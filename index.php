<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discuss_2.0</title>
    <?php include("./client/common.php"); ?>
    <style>
        /* This is crucial for the flexbox sticky footer to work */
        html {
            height: 100%;
        }

        /* Optional: If your header.php includes a fixed-top navbar,
           you might need to add padding-top to the body to prevent overlap.
           Adjust 56px to your actual navbar height.
        */
        body {
            padding-top: 56px;
        }
    </style>
</head>

<body class="d-flex flex-column vh-100">

    <?php
    session_start();
    include "./client/header.php";

    // At the top, after session_start()
    if (isset($_SESSION['user']['username'])) {
        // User is logged in, redirect them if they try to access login/signup directly
        if (isset($_GET["signup"]) || isset($_GET["login"])) {
            header("location: /code step by step/Discuss-2.0/"); // Or wherever your main logged-in page is
            exit(); // Always exit after a header redirect
        }
    }
    ?>

    <main class="flex-grow-1">
        <?php
        if (isset($_GET["signup"])) {
            include "./client/signup.php";
        } elseif (isset($_GET["login"])) {
            include "./client/login.php";
        } elseif (isset($_GET["ask"])) {
            include "./client/ask.php";
        } elseif (isset($_GET["logo"])) {
            include("./client/home.php");
        } elseif (isset($_GET['catagory'])) {
            include("./client/catagory_list.php");
        } elseif (isset($_GET['latest_questions'])) {
            include("./client/latest_questions.php");
        } elseif (isset($_GET['about_me'])) {
            include("./client/contact.php");
        } elseif (isset($_GET['portfolio'])) {
            include("./client/portfolio.php");
            // include("./client/portfolio copy.php");
        } elseif (isset($_GET['my_blog'])) {
            include("./client/my_blog.php");
        } elseif (isset($_GET['Q_id']) && isset($_SESSION['user']['username']))  {
            $Q_id = $_GET['Q_id']; // This variable will be available in question.php
            include("./client/question.php");
        } elseif (isset($_GET['cat_id'])) {
            $cat_id = $_GET['cat_id']; // This variable will be available in home.php
            include("./client/home.php");
            // echo $cat_id;
        } else {
            include "./client/home.php";
        }
        ?>
    </main>

    <?php
    // Include the footer, ensuring it has the mt-auto class
    include("./client/footer.php");
    ?>
</body>

</html>