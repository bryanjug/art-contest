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
                <form method='post' action='process.php'>
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
                        ?>
                    </section>
                    <?php
                        if(@$_GET['Empty'] == true) {
                    ?>

                    <div style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>
                        <?php
                            echo $_GET['Empty']
                        ?>
                    </div>

                    <?php
                        }
                    ?>

                    <?php
                        if(@$_GET['Invalid'] == true) {
                    ?>

                    <div style='color: white;padding-top: 5%;padding-bottom: 5%;background-color: rgba(255, 0, 0, 0.7);'>
                        <?php
                            echo $_GET['Invalid']
                        ?>
                    </div>

                    <?php
                        }
                    ?>

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