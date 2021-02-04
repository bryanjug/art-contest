<?php 
    session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Art Contest | Forgot Email | Challenge your art skills with other artists and win special prizes</title>
    <link rel="stylesheet" type="text/css" media="screen" href="styles.php">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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

        <div class='row'>
            <div class='col-12 col-sm-6 login'>
                <form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
                    <section id='results'>
                        <?php

                            //**********************************************
                            //*
                            //*  Connect to MySQL and Database
                            //*  find the user's email address in the db and send a confirmation email to it
                            //**********************************************

                            $db = mysqli_connect('','','', '');

                            if (!$db)
                            {
                                print "<h1 style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>Unable to Connect to MySQL</h1>";
                            }
   
                            if (isset($_POST['signUp'])) {
                                $username = $_POST['username'];

                                if (empty($username)) {    
                                    print "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>Please fill in the form box!</p>";

                                } else {
                                    $outputDisplay = doCheckLogin($db, $username);
                                    print "<br>".$outputDisplay;
                                }
                            }
                        ?>
                    </section>
                    <div class="form-group">
                      <label class='form-control-lg' for="exampleInputUser1">Enter Your Username</label>
                      <input type="text" name='username' class="form-control form-control-lg" id="exampleInputUser1" aria-describedby="userHelp" placeholder="Username">
                    </div>
                    <button type="submit" class="btn-lg btn-primary loginButton" name='signUp'>Recover</button>   
                    <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
                </form>
            </div>
            <div class='col-12 col-sm-6 loginBottom'>
                <img src='images/forgotEmail.png' class='img-fluid'> 
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
                <p><b>Spread your artistic skills </b>for a chance at some real prizes!</p>
                <a href='contests.php'>
                    <button type="button" class="btn btn-primary btn-sm btn-block">Get Started</button>
                </a>
            </div>
            <div class='col-12 col-sm-3'>
                <ul>
                    <li><b><a href='contests.php'>Contests</a></b></li>
                    <li><?php print date("m/d/Y", strtotime('-1 second',strtotime('+1 month',strtotime(date('m').'/01/'.date('Y').' 00:00:00')))); ?></li>
                    <li><?php print date("m/d/Y", strtotime('-1 second',strtotime('+2 month',strtotime(date('m').'/01/'.date('Y').' 00:00:00')))); ?></li>
                    <li><?php print date("m/d/Y", strtotime('-1 second',strtotime('+3 month',strtotime(date('m').'/01/'.date('Y').' 00:00:00')))); ?></li>
                    <li><?php print date("m/d/Y", strtotime('-1 second',strtotime('+4 month',strtotime(date('m').'/01/'.date('Y').' 00:00:00')))); ?></li>
                </ul>
            </div>
            <div class='col-12 col-sm-3'>
                <ul>
                    <li><b><a href='leaderboards.php'>Leaderboards</a></b></li>
                    <li>
                        <?php
                            $username_1_sql = 'SELECT username FROM users ORDER BY likes DESC LIMIT 1;';
                            $username_1_result = mysqli_query($db, $username_1_sql);

                            while ($row = mysqli_fetch_array($username_1_result)) {
                                $username_1 = $row['username'];
                            }

                            echo $username_1;
                        ?>
                    </li>
                    <li>
                        <?php
                            $username_2_sql = 'SELECT username FROM users ORDER BY likes DESC LIMIT 2;';
                            $username_2_result = mysqli_query($db, $username_2_sql);

                            while ($row = mysqli_fetch_array($username_2_result)) {
                                $username_2 = $row['username'];
                            }

                            echo $username_2;
                        ?>
                    </li>
                    <li>
                        <?php
                            $username_3_sql = 'SELECT username FROM users ORDER BY likes DESC LIMIT 3;';
                            $username_3_result = mysqli_query($db, $username_3_sql);

                            while ($row = mysqli_fetch_array($username_3_result)) {
                                $username_3 = $row['username'];
                            }

                            echo $username_3;
                        ?>
                    </li>
                    <li>
                        <?php
                            $username_4_sql = 'SELECT username FROM users ORDER BY likes DESC LIMIT 4;';
                            $username_4_result = mysqli_query($db, $username_4_sql);

                            while ($row = mysqli_fetch_array($username_4_result)) {
                                $username_4 = $row['username'];
                            }

                            echo $username_4;
                        ?>
                    </li>
                </ul>
            </div>
            <div class='col-12 col-sm-6'>
                <ul>
                    <li><b><a href='shop.php'>Shop</a></b></li>
                    <li>Parblo PR-01 Two-Finger Glove</li>
                    <li>XP-Pen G430S OSU Tablet</li>
                    <li>Huion H610 Pro V2</li>
                </ul>
            </div>
            <div class='col-12 col-sm-6'>
                <ul>
                    <li><b><a href='about.php'>About</a></b></li>
                    <li>Contact</li>
                    <li>Information</li>
                </ul>
            </div>
            <div class='col-12 privacy'>
                <p>&copy; 2020 All Rights Reserved  |  <a href='#'>Privacy Policy</a>  |  <a href='#'>Terms of Use</a></p>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    function doCheckLogin($db, $username) {
        $sql_statement = 'SELECT email FROM users WHERE username = "'.$username.'";';

        $result = mysqli_query($db, $sql_statement);  // Run SELECT

        if (!$result) {
            $outputDisplay = "<p style='color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
            $outputDisplay .= "MySQL Error: ".mysqli_error($db)."<br>";
            $outputDisplay .= "<br>SQL: ".$sql_statement."<br>";
        } else {
            $numresults = mysqli_num_rows($result);
            
            if ($numresults == 0) //if no email in user list = tell user cant find that username
            {
                $outputDisplay = "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>Sorry, this username does not exist.</p>";
            } else { //if user exists = tell user to check their email
                $outputDisplay = "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(0, 181, 0, 0.7);'>That username exists! Please check your email inbox.</p>";

                while ($row = mysqli_fetch_array($result)) {
                    $email = $row['email'];
                }

                $to = $email;
                
                $subject = 'Confirm Art Contest Email';
                
                $message = "
                    <html>
                    <head>
                        <title>Confirm Art Contest Email</title>
                        <style>
                            #background {
                                background-color: #009CFF;
                                color: white;
                                text-align: center;
                                padding-top: 5%;
                            }

                            img {
                                width: 50%;
                            }

                            h1 {
                                font-size: 200%;
                            }

                            #content {
                                color: black;
                                background-color: white;
                                border-radius: 30px 30px 0px 0px;
                                margin-top: 5%;
                                padding-top: 5%;
                                padding-bottom: 5%;
                                margin-left: 20%;
                                margin-right: 20%;
                                padding-left: 5%;
                                padding-right: 5%;
                            }

                            #footer {
                                background-color: rgb(58, 66, 232);
                                color: white;
                                padding-top: 5%;
                                padding-bottom: 5%;
                                margin-left: 20%;
                                margin-right: 20%;
                                padding-left: 5%;
                                padding-right: 5%;
                            }

                            #footer a {
                                color: white;
                                text-decoration: none;
                            }

                            #footer a:hover {
                                text-decoration: underline;
                            }

                            #footerParagraph {
                                padding-bottom: 5%;
                            }
                        </style>
                    </head>
                    <body>
                        <div id='background'>
                            <h1>The Art Contest</h1>
                            <img src='https://cdni.iconscout.com/illustration/premium/thumb/mail-marketing-2162027-1819863.png'> 
                            <div id='content'>
                                <h4>
                                    This email was sent to you in order to confirm your email address for the username: {$username}
                                </h4>
                                <br>
                                <h4>
                                    If this wasn't meant for you, someone may be trying to log into your Art Contest account.
                                </h4>
                            </div>
                            <div id='footer'>
                                <h2>
                                    Commited To Artists Around The World
                                </h2>
                                <h4 id='footerParagraph'>
                                    The Art Contest is a proud member of the art community. We strive to find talent and to collaborate with other artists to make a difference in the world of artistry. Our mission is to help those who wish to turn their hard work into a profession.
                                </h4>
                                <img src='https://img.pngio.com/png-divider-lines-transparent-divider-linespng-images-pluspng-line-separator-png-1400_339.png'>
                                <h2>
                                    Stay Connected
                                </h2>
                                <h4>
                                    <a href='#'>Home</a>  |  <a href='#'>Contests</a>  |  <a href='#'>Leaderboards</a>  |  <a href='#'>Shop</a>  |  <a href='#'>About</a>
                                </h4>
                                <h4>
                                &copy; 2020 All Rights Reserved  |  <a href='#'>Privacy Policy</a>  |  <a href='#'>Terms of Use</a>
                                </h4>
                            </div>
                        </div>
                    </body>
                    </html>
                    ";

                // Always set content-type when sending HTML email
                $headers = 'From: The Art Contest <BryanDJug@gmail.com>' . "\r\n";
                $headers .= "Reply-To: BryanDJug@gmail.com" . "\r\n";
                $headers .= "Content-type:text/html" . "\r\n";

                mail($to, $subject, $message, $headers);
            }
        }

        return $outputDisplay;
    }
?>