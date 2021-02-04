<?php 
    session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Art Contest | About | Challenge your art skills with other artists and win special prizes</title>
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
        <?php

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
        ?>
        <div class='row'>
            <div class='col-12 col-sm-6 about'>
                <p>Bryan Jug - Full Stack Developer</p>
                <img src='images/bryanjug.png' class='img-fluid bryanjug'>
                <p class='aboutInfo'>I do my best to use my skills to help others save money with their art. Programming is my passion and I hope to help the lives of others with it.</p>
                <section class='emailContainer'>
                    <img src='images/email.png' class='img-fluid email'>
                    <p class='emailText'>Email</p>
                </section>
            </div>
            <div class='col-12 col-sm-6 aboutBottom'>
                <h4>Some things about me.</h4>
                <p>I'm a software developer located in California, USA and I enjoy making cool, new things. I chose software development because I could create businesses that may make an impact on someone's life for the better. I'm super interested in graphic design and art! I've taken many classes in both high school and college for art and design.</p>

                <h4>Why did you make the Art Contest?</h4>
                <p>I'm determined to help new artists find a way to make money with their art, whether it be digital or physical. Anyone is welcome to compete for likes, which is the currency used to purchase prizes.</p>

                <h4>What is the Art Contest?</h4>
                <p>The Art Contest is a web application that allows people from all around the world to participate in a timed and friendly competition. You can sign up in one of our art competitions today!</p>

                <h4>How can I contact the owner?</h4>
                <p>You can send an Email to me and I'll try to get back to you as soon as possible. Email me at: <a href="mailto:dev@bryanjug.tech">Dev@bryanjug.tech</a></p>
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
                <a href='signUp.php'>
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