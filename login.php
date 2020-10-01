<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Art Contest | Login | Challenge your art skills with other artists and win special prizes</title>
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
                            //*  userID, username, email, password, likes, posts
                            //**********************************************

                            $db = mysqli_connect('localhost','root','', 'artContest');

                            if (!$db)
                            {
                                print "<h1 style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>Unable to Connect to MySQL</h1>";
                            }
   
                            if (isset($_POST['login'])) {
                                $email = $_POST['email'];
                                $password = $_POST['password'];

                                if (empty($email) || empty($password)) {    
                                    print "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>Please fill in every form box!</p>";
                                } else {
                                    $outputDisplay = doCheckLogin($db, $email, $password);
                                    print "<br>".$outputDisplay;
                                }
                            }
                        ?>
                    </section>
                    <div class="form-group">
                      <label class='form-control-lg' for="exampleInputEmail1">Email address</label>
                      <input type="text" name='email' class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="userHelp" placeholder="Email address">
                      <small id="forgotEmail" class="form-text forgotLink"><a href='forgotEmail.php'>Forgot Email?</a></small>
                    </div>
                    <div class="form-group">
                      <label class='form-control-lg' for="exampleInputPassword1">Password</label>
                      <input type="password" name='password' class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                      <small id="forgotPassword" class="form-text forgotLink"><a href='forgotPassword.php'>Forgot password?</a></small>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="remember" name="remember" value="remember">
                        <label class="form-check-label" for="exampleCheck1">Keep me signed in</label>
                    </div>
                    <button type="submit" class="btn-lg btn-primary loginButton" name='login'>Login</button>
                    <p>Don't have an account? <b><a href='signUp.php'>Sign up</a></b></p>    
                    <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
                </form>
            </div>
            <div class='col-12 col-sm-6 loginBottom'>
                <img src='images/login.png' class='img-fluid'> 
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
    function doCheckLogin($db, $email, $password) {
        $sql_statement = 'SELECT userID, password FROM users WHERE email = "'.$email.'"';

        $result = mysqli_query($db, $sql_statement);  // Run SELECT

        if (!$result) {
            $outputDisplay = "<p style='color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
            $outputDisplay .= "MySQL Error: ".mysqli_error($db)."<br>";
            $outputDisplay .= "<br>SQL: ".$sql_statement."<br>";
        } else {
            $numresults = mysqli_num_rows($result);
            
            $data = $result->fetch_array();
            if ($numresults == 0) {
                $outputDisplay = "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>Invalid Login</p>";
            }
            
            if (password_verify($password, $data['password'])) {  
                $outputDisplay = "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(0, 181, 0, 0.7);'>Valid Login</p>";
            } else {
                $outputDisplay = "<p style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>Invalid Login</p>";
            } 
        }

        return $outputDisplay;
    }
?>