<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Art Contest | Forgot Password | Challenge your art skills with other artists and win special prizes</title>
    <link rel="stylesheet" type="text/css" href="styles.css">    
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
                                    session_start();
                                    
                                    if (isset($_SESSION['user'])) {
                                        echo '<a href="account.php" style="position: relative; bottom: 13%;"><svg width="3em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                                            </svg></a>';
                                        echo '<br><a href="logout.php?logout" style="position: absolute;top: 50%;">Logout</a>';
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
   
                            if (isset($_POST['signUp'])) {
                                $email = $_POST['email'];

                                $code = uniqid(true);

                                if (empty($email)) {    
                                    print "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>Please fill in the form box!</p>";

                                } else {
                                    $outputDisplay = doCheckLogin($db, $email, $code);
                                    print "<br>".$outputDisplay;
                                }
                            }
                        ?>
                    </section>
                    <div class="form-group">
                    <label class='form-control-lg' for="exampleInputEmail1">Recover Password</label>
                      <input type="text" name='email' class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="userHelp" placeholder="Email address">
                    </div>
                    <button type="submit" class="btn-lg btn-primary loginButton" name='signUp'>Recover</button>   
                    <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
                </form>
            </div>
            <div class='col-12 col-sm-6 loginBottom'>
                <img src='images/forgotPassword.png' class='img-fluid'> 
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

<?php
    function doCheckLogin($db, $email, $code) {
        $sql_statement_code = 'INSERT INTO resetPasswords(code, email) VALUES ("'.$code.'", "'.$email.'");';
        $sql_statement = 'SELECT email FROM users WHERE email = "'.$email.'";';

        $result = mysqli_query($db, $sql_statement);  // Run SELECT
        $result_code = mysqli_query($db, $sql_statement_code);

        if (!$result) {
            $outputDisplay = "<p style='color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
            $outputDisplay .= "MySQL Error: ".mysqli_error($db)."<br>";
            $outputDisplay .= "<br>SQL: ".$sql_statement."<br>";
        } else {
            $numresults = mysqli_num_rows($result);
            
            if ($numresults == 0) //if no email in user list = tell user cant find that email
            {
                $outputDisplay = "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>Sorry, this email does not exist.</p>";
            } else { //if user exists = tell user to check their email
                $outputDisplay = "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(0, 181, 0, 0.7);'>That email address exists! Please check your email inbox.</p>";

                while ($row = mysqli_fetch_array($result)) {
                    $email = $row['email'];
                }

                $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/changePassword.php?code=$code";

                $to = $email;
                
                $subject = 'Forgot Art Contest Password';
                
                $message = "
                    <html>
                    <head>
                        <title>Forgot Art Contest Password</title>
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
                                    This email was sent to you because you forgot your password. Click <a href='$url'>here</a> to change your password.
                                </h4>
                                <br>
                                <h4>
                                    If this wasn't meant for you, someone may be trying to access your Art Contest account.
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
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: BryanDJug@gmail.com' . "\r\n";

                mail($to, $subject, $message, $headers);
            }
        }

        return $outputDisplay;
    }
?>