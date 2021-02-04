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

    //end of db connection

    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = 'SELECT password FROM users WHERE email = "'.$email.'";';
        $result = mysqli_query($db, $query);

        if(empty($email) || empty($password)) {
            header('location:login.php?Empty= Please fill in the blanks');
        } else if ($result->num_rows > 0) {
            $data = $result->fetch_array();

            if (password_verify($password, $data['password'])) {  
                $_SESSION['user'] = $email;
                header('location:index.php');
            } else {
                header('location:login.php?Empty= Please enter correct email and password');
            }
        } else {
            header('location:login.php?Empty= Please enter correct email and password');
        }
    }
?>