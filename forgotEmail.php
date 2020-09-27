<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Art Contest | Forgot Email | Challenge your art skills with other artists and win special prizes</title>
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
                                <a class="nav-link" href="contests.html">Contests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="leaderboards.html">Leaderboards</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id='brand' href="index.html">The Art Contest</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="shop.html">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id='navbarLogin' href="login.php">Login</a>
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
                            //*  find the user's email address in the db and send a confirmation email to it
                            //**********************************************

                            $db = mysqli_connect('localhost','root','', 'artContest');

                            if (!$db)
                            {
                                print "<h1>Unable to Connect to MySQL</h1>";
                            }
   
                            if (isset($_POST['signUp'])) {
                                $username = $_POST['username'];

                                if (empty($username)) {    
                                    print "<p>Please fill in the form box!</p>";

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
                <a href='contests.html'>
                    <button type="button" class="btn btn-primary btn-sm btn-block">Get Started</button>
                </a>
            </div>
            <div class='col-12 col-sm-3'>
                <ul>
                    <li><b><a href='#'>Contests</a></b></li>
                    <li>5-10</li>
                    <li>5-1</li>
                    <li>4-21</li>
                    <li>4-11</li>
                </ul>
            </div>
            <div class='col-12 col-sm-3'>
                <ul>
                    <li><b><a href='#'>Leaderboards</a></b></li>
                    <li>User #1</li>
                    <li>User #2</li>
                    <li>User #3</li>
                </ul>
            </div>
            <div class='col-12 col-sm-6'>
                <ul>
                    <li><b><a href='#'>Shop</a></b></li>
                    <li>Shop Item #1</li>
                    <li>Shop Item #2</li>
                </ul>
            </div>
            <div class='col-12 col-sm-6'>
                <ul>
                    <li><b><a href='#'>About</a></b></li>
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
                $outputDisplay = "<p>Sorry, this username does not exist.</p>";
            } else { //if user exists = tell user to check their email
                $outputDisplay = "<p>That username exists! Please check your email inbox.</p>";

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
                    </style>
                    </head>
                    <body>
                    <div id='background'>
                    <h1>The Art Contest</h1>
                    <img src='https://cdni.iconscout.com/illustration/premium/thumb/mail-marketing-2162027-1819863.png'> 
                    <h4>
                    This email was sent to you in order to confirm your email address for the username: {$username}
                    </h4>
                    <br>
                    <h4>
                    If this wasn't meant for you, someone may be trying to log into your Art Contest account.
                    </h4>
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