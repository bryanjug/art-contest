<?php

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
        session_start();
        
        $email = $_SESSION['user'];
        
        $tmp_name = $_FILES["file"]["tmp_name"];
        
        $name = $email.time().".png";

        $uploads_dir = realpath(dirname(getcwd()))."/profileImages";

        move_uploaded_file($tmp_name, "$uploads_dir/$name");

        $sql = 'UPDATE users SET profileImage = "'.$name.'" WHERE email = ("'.$email.'");';
        
        if (mysqli_query($db, $sql)) {
            header('location:../account.php');
        } else {
            echo "error";
        }
    }
?>