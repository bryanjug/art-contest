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
                    <div class="form-group">
                      <label class='form-control-lg' for="exampleInputEmail1">Email address</label>
                      <input type="text" name='email' class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="userHelp" placeholder="Email address">
                    </div>
                    <div class="form-group">
                      <label class='form-control-lg' for="exampleInputUser1">Username</label>
                      <input type="text" name='username' class="form-control form-control-lg" id="exampleInputUser1" aria-describedby="userHelp" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label class='form-control-lg' for="exampleInputPassword1">Password</label>
                      <input type="password" name='password' class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label class='form-control-lg' for="exampleInputPassword2">Confirm Password</label>
                      <input type="password" name='password2' class="form-control form-control-lg" id="exampleInputPassword2" placeholder="Password">
                    </div>
                    <button type="submit" class="btn-lg btn-primary loginButton" name='signUp'>Sign Up</button>
                    <p>Already have an account? <b><a href='login.php'>Login</a></b></p>    
                    <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
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
                                print "<h1>Unable to Connect to MySQL</h1>";
                            }
   
                            if (isset($_POST['signUp'])) {
                                $email = $_POST['email'];
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $password2 = $_POST['password2'];

                                if (empty($email) || empty($password) || empty($password2) || empty($username)) {    
                                    print "<p>Please fill in every form box!</p>";

                                } else if ($password != $password2) {
                                    print "<p>Please make sure your passwords are matching!</p>";
                                } else {
                                    $outputDisplay = doCheckLogin($db, $username, $email, $password);
                                    print "<br>".$outputDisplay;
                                }
                            }
                        ?>
                    </section>
                </form>
            </div>
            <div class='col-12 col-sm-6 loginBottom'>
                <img src='images/signUp.png' class='img-fluid'> 
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
    function doCheckLogin($db, $username, $email, $password) {
        $sql_statement = 'SELECT * FROM user WHERE email = "'.$email.'" AND ';
        $sql_statement .= 'password = "'.$password.'";';

        $result = mysqli_query($db, $sql_statement);  // Run SELECT

        if (!$result) {
            $outputDisplay = "<p style='color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
            $outputDisplay .= "MySQL Error: ".mysqli_error($db)."<br>";
            $outputDisplay .= "<br>SQL: ".$sql_statement."<br>";
        } else {
            $numresults = mysqli_num_rows($result);
            
            if ($numresults == 0) //if no email in user list = insert a email, username, & password
            {
                $sql_statement_INSERT = 'INSERT INTO user (username, email, password) ';
                $sql_statement_INSERT .= 'VALUES ("'.$username.'", "'.$email.'", "'.$password.'");';
                
                $result_INSERT = mysqli_query($db, $sql_statement_INSERT);
                
                $outputDisplay = "<p>Account created! Try logging in now.</p>";
            } else { //if user exists = tell user that email already has an account
                $outputDisplay = "<p>That Email already exists! Try a different one.</p>";
            }
        }

        return $outputDisplay;
    }
?>