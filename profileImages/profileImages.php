<?php
    //**********************************************
    //*
    //*  Detect Server
    //*
    //**********************************************
    $server = $_SERVER['SERVER_NAME'];

    $server = 'localhost';

    //**********************************************
    //*
    //*  Connect to MySQL and Database
    //*  
    //**********************************************

    $db = mysqli_connect('localhost','root','', 'artContest');

    if (!$db)
    {
        print "<h1 style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>Unable to Connect to MySQL</h1>";
    }

    if (isset($_POST['submit'])) {
        session_start();
        $email = $_SESSION['user'];
        
        $tmp_name = $_FILES["file"]["tmp_name"];
        
        $name = $email.".png";

        $uploads_dir = realpath(dirname(getcwd()))."/profileImages";

        move_uploaded_file($tmp_name, "$uploads_dir/$name");

        $sql = 'UPDATE users SET profileImage = "'.$name.'" WHERE email = ("'.$email.'");';
        
        if (mysqli_query($db, $sql)) {
            echo "File successfully uploaded";
        } else {
            echo "error";
        }
    }
?>