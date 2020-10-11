<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Art Contest | Contests | Challenge your art skills with other artists and win special prizes</title>
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
        <div class='row mt-5 pt-5 contests'>
            <div class='col-12'>
                <h5 class='text-center pb-3 date currentContest'><b>Current Contest Ends:</b></h5>
                <h4 class='text-center pb-3 date'><b>
                    <?php
                        $date = date("m/d/Y", strtotime('-1 second',strtotime('+1 month',strtotime(date('m').'/01/'.date('Y').' 00:00:00'))));
                        print $date;
                        print "<br>";
                        
                        if (date("m/d/Y") == date("m/d/Y", strtotime('+1 second',strtotime('+1 month',strtotime(date('m').'/01/'.date('Y').' 00:00:00'))))) {
                            $sql_delete_contest = 'DELETE FROM contest;';
                            $sql_delete_likes = 'DELETE FROM contest_likes;';

                            mysqli_query($db, $sql_delete_contest);
                            mysqli_query($db, $sql_delete_likes);

                            $path = 'contestImages/';

                            $filesToKeep = array(
                                $path . "contestImages.php"
                            );
                            $extensionsToKeep = array(
                                "php"
                            );

                            $dirList = glob($path . '*');
                            
                            foreach ($dirList as $file) {
                                if (!in_array($file, $filesToKeep)) {
                                    if (is_dir($file)) {
                                        rmdir($file);
                                    } else {
                                        $fileExtArr = explode('.', $file);
                                        $fileExt = $fileExtArr[count($fileExtArr)-1];
                                        if(!in_array($fileExt, $extensionsToKeep)){
                                            unlink($file);
                                        }
                                    }
                                }
                            }
                        }
                    ?>
                </b></h4>
                <p class='text-center pb-3'>Your goal here is to recreate the image below in any style you choose and upload it by the date indicated at the top of the page. At the end of each month, the contest image will change and so will the contest date. <b>Whoever ends up with the most likes will win the most points!</b></p>
                <img src='images/contestphoto.png' class="img-fluid contestPhoto">
            </div>
        </div>
        <div class='row pt-5 contests'>
            <div class='col-12 col-sm-5 upload'>
                <img src='
                    <?php
                        if (isset($_SESSION['user'])) {
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
                        } else {
                            echo "profileImages/user.png";
                        }
                    ?>
                ' class="img-fluid userImage">
                <?php
                    if (isset($_SESSION['user'])) {
                        print "
                            <form class='uploadButtons' action='contestImages/contestImages.php' method='post' enctype='multipart/form-data'>
                                <label for='fileUpload' class='contestUpload'>
                                    <input type='file' name='file' id='fileUpload'>
                                    Upload
                                </label>
                                <input type='submit' id='submitButton' name='submit' value='Submit'>
                            </form>
                        ";
                    } else {
                        print "<br><p class='pleaseLogIn'>Please log in to participate in the contest.</p>";
                    }
                ?>
            </div>
            <div class='col-12 col-sm-7'>
                <?php
                    if (isset($_SESSION['user'])) {
                        $email = $_SESSION['user'];
                        $sql_user_id = 'SELECT id from users WHERE email = "'.$email.'";';
                        $result_user_id = mysqli_query($db, $sql_user_id);

                        while ($row = mysqli_fetch_array($result_user_id)) {
                            $user_id = $row['id'];
                        }

                        $_SESSION['user_id'] = (int)$user_id;

                        $sql_contest = "
                        SELECT contest.id, contest.image, contest.username, 
                        COUNT(contest_likes.id) AS likes  
                        FROM 
                        contest 
                        LEFT JOIN contest_likes 
                        ON contest_likes.contestImage = contest.id 
                        GROUP BY contest.id 
                        ORDER BY likes DESC;
                        ";
                        
                        $result_contest = mysqli_query($db, $sql_contest);

                        while ($row = mysqli_fetch_array($result_contest)) {
                            $image = $row['image'];
                            $likes = $row['likes'];
                            $username = $row['username'];

                            print "
                                <img src='contestImages/$image' class='img-fluid mx-auto d-block w-100'>
                                <div class='row pb-4'>
                                    <div class='col-4'>
                            ";

                            $sql_like_check = '
                            SELECT contestImage, user FROM contest_likes WHERE contestImage = "'.$row['id'].'" AND user = "'.$_SESSION['user_id'].'";
                            ';

                            $result_like_check = mysqli_query($db, $sql_like_check);
                            
                            if ($result_like_check->num_rows > 0) {    
                                print "
                                                <img class='liked' src='images/liked.png' class='img-fluid' id='liked'>
                                ";
                            } else {
                                print '     <a id="unlikedButton" href="contests.php?type=contest&id='.$row['id'].'">
                                ';

                                print "
                                                <img class='unliked' src='images/unliked.png' class='img-fluid' id='unliked'>
                                ";
                            }
                            print "
                                        </a>
                                        <p class='likes'>$likes</p>
                                    </div>
                                    <div class='col-8'>
                                        <p class='contestUser'>$username</p>
                                    </div>
                                </div>
                            ";
                        }
                        
                        if(isset($_GET['type'], $_GET['id'])) {
                            $type = $_GET['type'];
                            $id = (int)$_GET['id'];

                            if($type == 'contest') {
                                $query = "
                                INSERT INTO contest_likes (user, contestImage)
                                SELECT {$_SESSION['user_id']}, {$id} FROM contest
                                WHERE EXISTS (
                                SELECT id FROM contest WHERE id = {$id})
                                AND NOT EXISTS (
                                SELECT id FROM contest_likes
                                WHERE user = {$_SESSION['user_id']} AND contestImage = {$id})
                                LIMIT 1;
                                ";
                                    
                                mysqli_query($db, $query);

                                $sql_insert_account = 'UPDATE users SET likes = likes + 1 WHERE id = "'.$_SESSION['user_id'].'";';
                                
                                mysqli_query($db, $sql_insert_account);

                                echo("
                                <script>
                                    location.href = 'contests.php';
                                </script>
                                ");
                            }
                        }
                    } else {
                        print "<p class='pleaseLogIn'>Please log in to see the contest images!</p>";
                    }
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