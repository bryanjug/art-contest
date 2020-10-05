<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Art Contest | Account | Challenge your art skills with other artists and win special prizes</title>
    <link rel="stylesheet" type="text/css" media="screen" href="styles.php">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-12'>
                <nav class='navbar fixed-top navbar-expand-md navbar-dark'>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="contests.php">Contests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="leaderboards.php">Leaderboards</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id='brand' href="index.php">The Art Contest</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="shop.php">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About</a>
                            </li>
                            <li class="nav-item">
                                <?php
                                    session_start();

                                    if (isset($_SESSION['user'])) {
                                        echo '<a href="account.php" class="account">
                                            <svg width="3em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                                <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                                            </svg><br>
                                        </a>';
                                        echo '<a href="account.php" class="accountText">Account</a>';
                                        echo '<br class="navBreak"><a href="logout.php?logout" class="logout">Logout</a>';
                                    } else {
                                        echo '<a class="nav-link" id="navbarLogin" href="login.php">Login</a>';
                                    }
                                ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
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
        ?>
        <div class='row'>
            <div class='col-12 accountHeader'>
                <form method='post' action="profileImages/profileImages.php" enctype="multipart/form-data">
                    <img class="custom-image-upload" src="
                        <?php 
                            $email = $_SESSION['user'];

                            $sql = 'SELECT profileImage FROM users WHERE email =  "'.$email.'";';
                            $result = mysqli_query($db, $sql);
                            
                            while ($row = mysqli_fetch_array($result)) {
                                $profileImage = $row['profileImage'];
                            }

                            if ($profileImage != '') {
                                echo "profileImages/$email.png";
                            } else {
                                echo "profileImages/user.png";
                            }
                        ?>
                    ">
                    <div class='parent'>
                        <label for="fileUpload" class="custom-file-upload">
                            <input type="file" name='file' class="fileUpload" id="fileUpload">
                            Change Profile Picture
                        </label>
                    </div>
                    
                    <input class='imageUpload' type="submit" value="Upload Image" name="submit">
                </form>
                <?php 
                    echo '<h3 class="welcomeMessage"><b>Account</b></h3>';
                ?>
                <div class='row'>
                    <div class='col-4 userInfo'>
                        <?php
                            $email = $_SESSION['user'];
                            
                            $sql_likes = 'SELECT likes FROM users WHERE email =  "'.$email.'";';
                            $result_likes = mysqli_query($db, $sql_likes);

                            $data = $result_likes->fetch_array();

                            echo "<p class='accountCounts counts'><b>".$data['likes']."</b></p>";
                        ?>
                        <p class='accountCounts'>Likes</p>
                    </div>
                    <div class='col-4 userInfo'>
                        <?php
                            $email = $_SESSION['user'];
                            
                            $sql_posts = 'SELECT posts FROM users WHERE email =  "'.$email.'";';
                            $result_posts = mysqli_query($db, $sql_posts);

                            $data = $result_posts->fetch_array();

                            echo "<p class='accountCounts counts'><b>".$data['posts']."</b></p>";
                        ?>
                        <p class='accountCounts'>Posts</p>
                    </div>
                    <div class='col-4 userInfo'>
                        <?php
                            $email = $_SESSION['user'];
                            
                            $sql_comments = 'SELECT comments FROM users WHERE email =  "'.$email.'";';
                            $result_comments = mysqli_query($db, $sql_comments);

                            $data = $result_comments->fetch_array();

                            echo "<p class='accountCounts counts'><b>".$data['comments']."</b></p>";
                        ?>
                        <p class='accountCounts'>Comments</p>
                    </div>
                </div>
            </div>
        </div>
        <div class='row accountInfo'>
            <div class='col-4'>
                <p><b>Email Address</b></p>
            </div>
            <div class='col-8'>
                <form method="post" action='<?php echo $_SERVER['PHP_SELF']; ?>'>
                    <?php
                        $email = '<p class="userEmail">'.$_SESSION['user'].'</p>';
                        print $email;
                    ?>
                </form>
            </div>
        </div>
        <div class='row accountInfo'>
            <div class='col-4'>
                <p><b>Change Password</b></p>
            </div>
            <div class='col-8'>
                <?php
                    if(isset($_POST['changePasswordButton'])) {
                        $password = $_POST['changePassword'];
                        $password2 = $_POST['changePassword2'];
                        
                        if (empty($password) || empty($password2)) {
                            print "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>Please fill in every form box!</p>";
                        } else if ($password != $password2) {
                            print "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>Please make sure your passwords are matching!</p>";
                        } else {
                            $email = $_SESSION['user'];
                            $hash = password_hash($password, PASSWORD_DEFAULT);
                            
                            $sql_statement_password = 'UPDATE users SET password = "'.$hash.'" WHERE email = "'.$email.'";';
                            $result_password = mysqli_query($db, $sql_statement_password);

                            if ($result_password) {
                                print "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(0, 181, 0, 0.7);'>Password Changed.</p>";
                            }
                        }
                    }
                ?>
                <form method="post" action='<?php echo $_SERVER['PHP_SELF']; ?>'>
                    <input type="password" name='changePassword' class="form-control form-control-md mb-3" id="exampleInputPassword1" aria-describedby="userHelp" placeholder="New Password">
                    <input type="password" name='changePassword2' class="form-control form-control-md" id="exampleInputPassword2" aria-describedby="userHelp" placeholder="Confirm Password">
                    <button type="submit" class="btn-md btn-primary changeAccountButton" name='changePasswordButton'>Change Password</button>
                </form>
            </div>
        </div>
        <div class='row accountInfo'>
            <div class='col-4'>
                <p><b>Change Username</b></p>
            </div>
            <div class='col-8'>
                <?php
                    if(isset($_POST['changeUsernameButton'])) {
                        $username = $_POST['changeUsername'];
                        $username2 = $_POST['changeUsername2'];
                        
                        if (empty($username) || empty($username2)) {
                            print "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>Please fill in every form box!</p>";
                        } else if ($username != $username2) {
                            print "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>Please make sure your usernames are matching!</p>";
                        } else {
                            
                            $email = $_SESSION['user'];
                            
                            $sql_check_username = 'SELECT username FROM users WHERE username = "'.$username.'";';
                            $result_check_username = mysqli_query($db, $sql_check_username);
                            $numresults = mysqli_num_rows($result_check_username);

                            if ($numresults == 0) {
                                $sql_statement_username = 'UPDATE users SET username = "'.$username.'" WHERE email = "'.$email.'";';
                                $result_username = mysqli_query($db, $sql_statement_username);

                                if ($result_username) {
                                    print "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(0, 181, 0, 0.7);'>Username Changed.</p>";
                                }
                            } else {
                                $outputDisplay = "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>This username already exists! Try a different one.</p>";
                            }
                        }
                    }
                ?>
                <form method="post" action='<?php echo $_SERVER['PHP_SELF']; ?>'>
                    <input type="text" name='changeUsername' class="form-control form-control-md mb-3" id="exampleInputUsername1" aria-describedby="userHelp" placeholder="New Username">
                    <input type="text" name='changeUsername2' class="form-control form-control-md" id="exampleInputUsername2" aria-describedby="userHelp" placeholder="Confirm Username">
                    <button type="submit" class="btn-md btn-primary changeAccountButton" name='changeUsernameButton'>Change Username</button>
                </form>
            </div>
        </div>
        <div class='row accountInfo'>
            <div class='col-4'>
                <p><b>Wallet</b></p>
            </div>
            <div class='col-8'>
                <?php
                    $email = $_SESSION['user'];
                            
                    $sql_wallet = 'SELECT wallet FROM users WHERE email = "'.$email.'";';
                    $result_wallet = mysqli_query($db, $sql_wallet);

                    $data = $result_wallet->fetch_array();

                    echo "<p class='wallet'><b>$".$data['wallet']."</b></p>";
                ?>
            </div>
        </div>
        <div class='row dotsOuter'>
            <div class='col-12'>
                <span class='dotSmall'></span>
                <span class='dotMedium'></span>
            </div>
        </div>
        <div class='row footer'>
            <div class='col-12 svg2'>
                <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-19.36,39.33 C129.98,-6.05 389.14,-24.80 520.73,111.35 L499.73,0.00 L0.00,0.00 Z" style="stroke: none; fill: #ffffff;"></path></svg>
            </div>
            <div class='col-12 col-sm-6'>
                <p class="footerText"><b>Spread your artistic skills </b>for a chance at some real prizes!</p>
                <a href='contests.php'>
                    <button type="button" class="btn btn-primary btn-sm btn-block">Get Started</button>
                </a>
            </div>
            <div class='col-12 col-sm-3'>
                <ul>
                    <li><b><a href='contests.php'>Contests</a></b></li>
                    <li>5-10</li>
                    <li>5-1</li>
                    <li>4-21</li>
                    <li>4-11</li>
                </ul>
            </div>
            <div class='col-12 col-sm-3'>
                <ul>
                    <li><b><a href='leaderboards.php'>Leaderboards</a></b></li>
                    <li>User #1</li>
                    <li>User #2</li>
                    <li>User #3</li>
                </ul>
            </div>
            <div class='col-12 col-sm-6'>
                <ul>
                    <li><b><a href='shop.php'>Shop</a></b></li>
                    <li>Shop Item #1</li>
                    <li>Shop Item #2</li>
                </ul>
            </div>
            <div class='col-12 col-sm-6'>
                <ul>
                    <li><b><a href='about.php'>About</a></b></li>
                </ul>
            </div>
            <div class='col-12 privacy'>
                <p>&copy; 2020 All Rights Reserved  |  <a href='#'>Privacy Policy</a>  |  <a href='#'>Terms of Use</a></p>
            </div>
        </div>
    </div>
</body>
</html>