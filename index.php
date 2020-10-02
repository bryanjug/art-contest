<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Art Contest | Home | Challenge your art skills with other artists and win special prizes</title>
    <link rel="stylesheet" type="text/css" href="styles.css">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src='show_width.js'></script>
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

        <div class='row curved'>
            <div class='col-6 welcome'>
                <h1>Welcome to <span id='title'>The Art Contest!</span></h1>
                <p class='welcomeMessage'>Want to earn money while showing off and practicing your skills? Compete with others now in a timed, online art competition. What are you waiting for? Sign up now below!</p>
                <a href='contests.php'>
                    <button type="button" class="btn btn-primary btn-md btn-block">Get Started</button>
                </a>
            </div>
            <div class='col-6 world m-auto'>
                <img src='images/sitting.png' class="img-fluid">
            </div>
            <div class='col-12 svg'>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="1 0 1439 319"><path fill="#ffffff" fill-opacity="1" d="M0,64L48,101.3C96,139,192,213,288,250.7C384,288,480,288,576,256C672,224,768,160,864,117.3C960,75,1056,53,1152,74.7C1248,96,1344,160,1392,192L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
            </div>
        </div>
        
        <div class='jumbotron mt-5'>
            <div class='row'>
                <div class='col-12 col-sm-12 col-md-6 m-auto pt-4'>
                    <img src='images/leaderboards.png' class="img-fluid homeInfoImage1">
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <h3 class='text-center pt-3'>Find out where you rank against others!</h3>
                    <p class='text-center'>Ever wondered where you rank in the world in terms of your artistic skills? 
                        With the Art Contest, you'll be able to find other users who are close to your level of expertise! 
                    </p>
                </div>
            </div>
        </div>
        
        <div class='jumbotron mt-5'>
            <div class='row'>
                <div class='col-12 col-sm-12 col-md-6'>
                    <h3 class='text-center'>Check out our current contests and user submitted images!</h3>
                    <p class='text-center mb-5 pb-3'>Join a contest, but before you sign up for one, make sure you check the 
                        end date for submissions! You wouldn't want to start working on your art piece to 
                        find out later that you could've been participating for a chance at some points.
                    </p>
                </div>
                <div class='col-12 col-sm-12 col-md-6 m-auto'>
                    <img src='images/contests.png' class="img-fluid homeInfoImage2">
                </div>
            </div>
        </div>
        <div class='jumbotron mt-5'>
            <div class='row'>
                <div class='col-12 col-sm-12 col-md-6 m-auto'>
                    <img src='images/shop.png' class="img-fluid homeInfoImage3">
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <h3 class='text-center pt-3'>Use your points to purchase gift cards and currencies!</h3>
                    <p class='text-center'>
                        At the Art Contest, we make sure that your time here is worth while. We know it can be difficult as an up-coming artist to make ends meet, 
                        and that's why we're here to provide our service! Finally there's a way to showcase your artistry while making money.
                    </p>
                </div>
            </div>
        </div>
        <div class='jumbotron mt-5'>
            <div class='row'>
                <div class='col-12 col-sm-12 col-md-6'>
                    <h3 class='text-center'>Connect with others to get help</h3>
                    <p class='text-center mb-5 pb-3'>
                        If you have any specific questions or want to find the FAQ (frequently asked questions), please navigate to the 'help' tab at the top or bottom of the page.
                    </p>
                </div>
                <div class='col-12 col-sm-12 col-md-6 m-auto'>
                    <img src='images/help.png' class="img-fluid homeInfoImage4">
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-12 tryItNow'>
                <a href='contests.php'>
                    <button type="button" class="btn btn-primary btn-lg btn-block">Try it out now!</button>
                </a>
                <p class='text-center mt-4 pb-3'>* We ensure that your information is private and secure!</p>
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