<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Art Contest | Shop | Challenge your art skills with other artists and win special prizes</title>
    <link rel="stylesheet" type="text/css" media="screen" href="styles.php">   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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
        <div class='row pt-5 mt-5 shop'>
            <div class='col-12 col-sm-6 col-lg-4 col-xl-3 shopItem'>
                <img src='https://images-na.ssl-images-amazon.com/images/I/613Yd40N1zL._AC_UL200_SR200,200_.jpg' class="card img-fluid">
                <h4>Parblo PR-01 Two-Finger Glove for Graphics Drawing Tablet Light Box Tracing Light Pad</h4>
                <section class='reviews'>
                    <img src='images/stars.png' class="stars img-fluid">
                    <p>25 Reviews</p>
                </section>
                <p>$6.99</p>
                <form method='get' action='https://amzn.to/2GPd3n3' target="_blank">
                    <input type='submit' name='purchase' value='Purchase' class='purchase'>
                </form>
            </div>
            <div class='col-12 col-sm-6 col-lg-4 col-xl-3 shopItem'>
                <img src='https://images-na.ssl-images-amazon.com/images/I/51Ktmb4oHXL._AC_UL200_SR200,200_.jpg' class="card img-fluid">
                <h4>XP-Pen G430S OSU Tablet Ultrathin Graphic Tablet 4 x 3 inch Digital Tablet Drawing Pen Tablet for OSU! (8192 Levels Pressure)</h4>
                <section class='reviews'>
                    <img src='images/stars.png' class="stars img-fluid">
                    <p>31 Reviews</p>
                </section>
                <p>$29.99</p>
                <form method='get' action='https://amzn.to/34Ka1ZE' target="_blank">
                    <input type='submit' name='purchase' value='Purchase' class='purchase'>
                </form>
            </div>
            <div class='col-12 col-sm-6 col-lg-4 col-xl-3 shopItem'>
                <img src='https://images-na.ssl-images-amazon.com/images/I/51gMxRQwCIL._AC_UL200_SR200,200_.jpg' class="card img-fluid">
                <h4>Huion H610 Pro V2 Graphic Drawing Tablet Android Supported Pen Tablet Tilt Function Battery-Free Stylus 8192 Pen Pressure with 8 Express Keys</h4>
                <section class='reviews'>
                    <img src='images/stars.png' class="stars img-fluid">
                    <p>25 Reviews</p>
                </section>
                <p>$49.99</p>
                <form method='get' action='https://amzn.to/3djM7b3' target="_blank">
                    <input type='submit' name='purchase' value='Purchase' class='purchase'>
                </form>
            </div>
            <div class='col-12 col-sm-6 col-lg-4 col-xl-3 shopItem'>
                <img src='https://images-na.ssl-images-amazon.com/images/I/61czsggyXwL._AC_UL200_SR200,200_.jpg' class="card img-fluid">
                <h4>GAOMON M10K2018 10 x 6.25 inches Graphic Drawing Tablet 8192 Levels of Pressure Digital Pen Tablet with Battery-Free Stylus</h4>
                <section class='reviews'>
                    <img src='images/stars.png' class="stars img-fluid">
                    <p>27 Reviews</p>
                </section>
                <p>$65.99</p>
                <form method='get' action='https://amzn.to/34K9Nlg' target="_blank">
                    <input type='submit' name='purchase' value='Purchase' class='purchase'>
                </form>
            </div>
            <div class='col-12 col-sm-6 col-lg-4 col-xl-3 shopItem'>
                <img src='https://images-na.ssl-images-amazon.com/images/I/41Mw9CDISIL._AC_UL200_SR200,200_.jpg' class="card img-fluid">
                <h4>Wacom Intuos Graphics Drawing Tablet with Bonus Software, 7.9" X 6.3", Black</h4>
                <section class='reviews'>
                    <img src='images/stars.png' class="stars img-fluid">
                    <p>22 Reviews</p>
                </section>
                <p>$79.95</p>
                <form method='get' action='https://amzn.to/30Uxjec' target="_blank">
                    <input type='submit' name='purchase' value='Purchase' class='purchase'>
                </form>
            </div>
            <div class='col-12 col-sm-6 col-lg-4 col-xl-3 shopItem'>
                <img src='https://images-na.ssl-images-amazon.com/images/I/5156F17pNmL._AC_UL200_SR200,200_.jpg' class="card img-fluid">
                <h4>Wacom Intuos Wireless Graphics Drawing Tablet with Bonus Software Included, 7.9" X 6.3", Black</h4>
                <section class='reviews'>
                    <img src='images/stars.png' class="stars img-fluid">
                    <p>42 Reviews</p>
                </section>
                <p>$99.95</p>
                <form method='get' action='https://amzn.to/3dlLIVF' target="_blank">
                    <input type='submit' name='purchase' value='Purchase' class='purchase'>
                </form>
            </div>
            <div class='col-12 col-sm-6 col-lg-4 col-xl-3 shopItem'>
                <img src='https://images-na.ssl-images-amazon.com/images/I/61s1VG8mNeL._AC_UL200_SR200,200_.jpg' class="card img-fluid">
                <h4>XP-PEN Artist12 11.6 Inch FHD Drawing Monitor Pen Display Graphic Monitor with PN06 Battery-Free Pen Multi-Function Pen Holder and Glove 8192 Pressure Sensitivity</h4>
                <section class='reviews'>
                    <img src='images/stars.png' class="stars img-fluid">
                    <p>56 Reviews</p>
                </section>
                <p>$249.99</p>
                <form method='get' action='https://amzn.to/2IaVz58' target="_blank">
                    <input type='submit' name='purchase' value='Purchase' class='purchase'>
                </form>
            </div>
            <div class='col-12 col-sm-6 col-lg-4 col-xl-3 shopItem'>
                <img src='https://images-na.ssl-images-amazon.com/images/I/71LJYirFqAL._AC_UL200_SR200,200_.jpg' class="card img-fluid">
                <h4>Huion KAMVAS Pro 16 Drawing Tablet Monitor Full-Laminated Pen Display Tilt Battery-Free Stylus with Adjustable Stand- 15.6 Inches</h4>
                <section class='reviews'>
                    <img src='images/stars.png' class="stars img-fluid">
                    <p>80 Reviews</p>
                </section>
                <p>$399.99</p>
                <form method='get' action='https://amzn.to/3dfNmrO' target="_blank">
                    <input type='submit' name='purchase' value='Purchase' class='purchase'>
                </form>
            </div>
            <div class='col-12 col-sm-6 col-lg-4 col-xl-3 shopItem'>
                <img src='https://images-na.ssl-images-amazon.com/images/I/71EqXaqliML._AC_UL200_SR200,200_.jpg' class="card img-fluid">
                <h4>XP-PEN Artist22E Pro Drawing Pen Display Graphic Monitor IPS Monitor 8192 Level Pen Pressure Drawing Pen Tablet Dual Monitor with 16 Express Keys and Adjustable Stand 21.5 Inch</h4>
                <section class='reviews'>
                    <img src='images/stars.png' class="stars img-fluid">
                    <p>59 Reviews</p>
                </section>
                <p>$499.99</p>
                <form method='get' action='https://amzn.to/3lCkIV4' target="_blank">
                    <input type='submit' name='purchase' value='Purchase' class='purchase'>
                </form>
            </div>
            <div class='col-12 col-sm-6 col-lg-4 col-xl-3 shopItem'>
                <img src='https://images-na.ssl-images-amazon.com/images/I/71hS-sYZusL._AC_UL200_SR200,200_.jpg' class="card img-fluid">
                <h4>Wacom Cintiq 16 Drawing Tablet with Screen</h4>
                <section class='reviews'>
                    <img src='images/stars.png' class="stars img-fluid">
                    <p>44 Reviews</p>
                </section>
                <p>$679.00</p>
                <form method='get' action='https://amzn.to/3jSpk8T' target="_blank">
                    <input type='submit' name='purchase' value='Purchase' class='purchase'>
                </form>
            </div>
            <div class='col-12 col-sm-6 col-lg-4 col-xl-3 shopItem'>
                <img src='https://m.media-amazon.com/images/I/51kQ0vMmH4L._AC_UY327_QL65_.jpg' class="card img-fluid">
                <h4>XP-PEN Artist24 Pro Drawing Pen Display 2K Resolution Graphics Tablet 23.8 Inch Screen Supports a USB-C to USB-C Connection（20 Customizable Shortcut Keys and Tilt Function）</h4>
                <section class='reviews'>
                    <img src='images/stars.png' class="stars img-fluid">
                    <p>6 Reviews</p>
                </section>
                <p>$899.99</p>
                <form method='get' action='https://amzn.to/30U1nX8' target="_blank">
                    <input type='submit' name='purchase' value='Purchase' class='purchase'>
                </form>
            </div>
            <div class='col-12 col-sm-6 col-lg-4 col-xl-3 shopItem'>
                <img src='https://m.media-amazon.com/images/I/61b2tHFaUcL._AC_UY327_QL65_.jpg' class="card img-fluid">
                <h4>Wacom Cintiq 22 Drawing Tablet with HD Screen, Graphic Monitor, 8192 Pressure-Levels 2019 Version Bundle with Wacom Cintiq Adjustable Stand</h4>
                <section class='reviews'>
                    <img src='images/stars.png' class="stars img-fluid">
                    <p>38 Reviews</p>
                </section>
                <p>$1,279.94</p>
                <form method='get' action='https://amzn.to/3iLHckp' target="_blank">
                    <input type='submit' name='purchase' value='Purchase' class='purchase'>
                </form>
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