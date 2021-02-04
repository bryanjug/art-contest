<?php
    session_start();
    //**********************************************
    //*
    //*  Connect to MySQL and Database
    //*  
    //**********************************************

    $db = mysqli_connect('','','', '');

    if (!$db)
    {
        print "<h1 style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>Unable to Connect to MySQL</h1>";
    }

    if (isset($_POST['submit'])) {
        
        $email = $_SESSION['user'];
        
        $tmp_name = $_FILES["file"]["tmp_name"];

        $name = rand(0,9999).$email.".png";

        $uploads_dir = realpath(dirname(getcwd()))."/contestImages";

        move_uploaded_file($tmp_name, "$uploads_dir/$name");

        $sql_username = 'SELECT username FROM users WHERE email = "'.$email.'";';
        $result_username = mysqli_query($db, $sql_username);

        while ($row = mysqli_fetch_array($result_username)) {
            $username = $row['username'];
        }
        $sql = ("INSERT INTO contest (image, email, username) VALUES ('$name', '$email', '$username')"); 

        $sql_add_post = ("UPDATE users SET posts = posts + 1 WHERE email = '$email'");
        mysqli_query($db, $sql_add_post);

        if (mysqli_query($db, $sql)) {
            echo("
                <script>
                    location.href = '../contests.php';
                </script>
            ");
        } else {
            echo "error";
        }
    }
?>