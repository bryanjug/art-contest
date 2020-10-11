<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Art Contest | Leaderboards | Challenge your art skills with other artists and win special prizes</title>
    <link rel="stylesheet" type="text/css" media="screen" href="styles.php">  
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
        <div class='row leaderboardsTop leaderboards'>
            <div class='col-12'>
                <h4 class='text-center mb-3 leaderboardsTitle'>Leaderboards</h4>
            </div>
            <div class='col-3 topInfo first'>
                <h3>1<span id='st'>st</span></h3>
            </div>
            <div class='col-6'>
                <img class='img-fluid firstImage' src='
                    <?php
                        $sql_first = 'SELECT profileImage FROM users ORDER BY likes DESC LIMIT 1;';
                        $result_first = mysqli_query($db, $sql_first);

                        while ($row = mysqli_fetch_array($result_first)) {
                            $profileImage = $row['profileImage'];
                        }

                        if ($profileImage != '') {
                            echo "profileImages/$profileImage";
                        } else {
                            echo "profileImages/user.png";
                        }
                    ?>
                '>
            </div>
            <div class='col-3 topInfo total'>
                <p class='score'><b>
                    <?php
                        $sql_top_likes = 'SELECT likes FROM users ORDER BY likes DESC LIMIT 1;';
                        $result_top_likes = mysqli_query($db, $sql_top_likes);

                        while ($row = mysqli_fetch_array($result_top_likes)) {
                            $likes = $row['likes'];
                        }

                        echo $likes;
                    ?>
                </b></p>
                <p class='score'>Likes</p>
            </div>
        </div>

        <div class='row leaderboardsMiddle leaderboards'>
            <div class='col-4'>
                <p><b>Place</b></p>
            </div>
            <div class='col-4'>
                <p><b>Username</b></p>
            </div>
            <div class='col-4'>
                <p><b>Likes</b></p>
            </div>
        </div>
        <div class='row leaderboardsBottom leaderboards'>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-12'>
                        <image src="
                            <?php
                                $sql_1 = 'SELECT profileImage FROM users ORDER BY likes DESC LIMIT 1;';
                                $result_1 = mysqli_query($db, $sql_1);

                                while ($row = mysqli_fetch_array($result_1)) {
                                    $profileImage_1 = $row['profileImage'];
                                }

                                if ($profileImage_1 != '') {
                                    echo "profileImages/$profileImage_1";
                                } else {
                                    echo "profileImages/user.png";
                                }
                            ?>
                        " class="placeHolderParent">
                            <img src="images/1.png" class="placeHolder">
                        </image>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $username_1_sql = 'SELECT username FROM users ORDER BY likes DESC LIMIT 1;';
                        $username_1_result = mysqli_query($db, $username_1_sql);

                        while ($row = mysqli_fetch_array($username_1_result)) {
                            $username_1 = $row['username'];
                        }

                        echo $username_1;
                    ?>
                </p>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        echo $likes;
                    ?>
                </p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-12'>
                        <image src="
                            <?php
                                $sql_2 = 'SELECT profileImage FROM users ORDER BY likes DESC LIMIT 2;';
                                $result_2 = mysqli_query($db, $sql_2);

                                while ($row = mysqli_fetch_array($result_2)) {
                                    $profileImage_2 = $row['profileImage'];
                                }

                                if ($profileImage_2 != '') {
                                    echo "profileImages/$profileImage_2";
                                } else {
                                    echo "profileImages/user.png";
                                }
                            ?>
                        " class="placeHolderParent">
                            <img src="images/2.png" class="placeHolder">
                        </image>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $username_2_sql = 'SELECT username FROM users ORDER BY likes DESC LIMIT 2;';
                        $username_2_result = mysqli_query($db, $username_2_sql);

                        while ($row = mysqli_fetch_array($username_2_result)) {
                            $username_2 = $row['username'];
                        }

                        echo $username_2;
                    ?>
                </p>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $sql_likes_2 = 'SELECT likes FROM users ORDER BY likes DESC LIMIT 2;';
                        $result_likes_2 = mysqli_query($db, $sql_likes_2);

                        while ($row = mysqli_fetch_array($result_likes_2)) {
                            $likes_2 = $row['likes'];
                        }

                        echo $likes_2;
                    ?>
                </p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-12'>
                        <image src="
                            <?php
                                $sql_3 = 'SELECT profileImage FROM users ORDER BY likes DESC LIMIT 3;';
                                $result_3 = mysqli_query($db, $sql_3);

                                while ($row = mysqli_fetch_array($result_3)) {
                                    $profileImage_3 = $row['profileImage'];
                                }

                                if ($profileImage_3 != '') {
                                    echo "profileImages/$profileImage_3";
                                } else {
                                    echo "profileImages/user.png";
                                }
                            ?>
                        " class="placeHolderParent">
                            <img src="images/3.png" class="placeHolder">
                        </image>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $username_3_sql = 'SELECT username FROM users ORDER BY likes DESC LIMIT 3;';
                        $username_3_result = mysqli_query($db, $username_3_sql);

                        while ($row = mysqli_fetch_array($username_3_result)) {
                            $username_3 = $row['username'];
                        }

                        echo $username_3;
                    ?>
                </p>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $sql_likes_3 = 'SELECT likes FROM users ORDER BY likes DESC LIMIT 3;';
                        $result_likes_3 = mysqli_query($db, $sql_likes_3);

                        while ($row = mysqli_fetch_array($result_likes_3)) {
                            $likes_3 = $row['likes'];
                        }

                        echo $likes_3;
                    ?>
                </p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-12'>
                        <image src="
                            <?php
                                $sql_4 = 'SELECT profileImage FROM users ORDER BY likes DESC LIMIT 4;';
                                $result_4 = mysqli_query($db, $sql_4);

                                while ($row = mysqli_fetch_array($result_4)) {
                                    $profileImage_4 = $row['profileImage'];
                                }

                                if ($profileImage_4 != '') {
                                    echo "profileImages/$profileImage_4";
                                } else {
                                    echo "profileImages/user.png";
                                }
                            ?>
                        " class="placeHolderParent">
                            <img src="images/4.png" class="placeHolder">
                        </image>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $username_4_sql = 'SELECT username FROM users ORDER BY likes DESC LIMIT 4;';
                        $username_4_result = mysqli_query($db, $username_4_sql);

                        while ($row = mysqli_fetch_array($username_4_result)) {
                            $username_4 = $row['username'];
                        }

                        echo $username_4;
                    ?>
                </p>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $sql_likes_4 = 'SELECT likes FROM users ORDER BY likes DESC LIMIT 4;';
                        $result_likes_4 = mysqli_query($db, $sql_likes_4);

                        while ($row = mysqli_fetch_array($result_likes_4)) {
                            $likes_4 = $row['likes'];
                        }

                        echo $likes_4;
                    ?>
                </p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-12'>
                        <image src="
                            <?php
                                $sql_5 = 'SELECT profileImage FROM users ORDER BY likes DESC LIMIT 5;';
                                $result_5 = mysqli_query($db, $sql_5);

                                while ($row = mysqli_fetch_array($result_5)) {
                                    $profileImage_5 = $row['profileImage'];
                                }

                                if ($profileImage_5 != '') {
                                    echo "profileImages/$profileImage_5";
                                } else {
                                    echo "profileImages/user.png";
                                }
                            ?>
                        " class="placeHolderParent">
                            <img src="images/5.png" class="placeHolder">
                        </image>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $username_5_sql = 'SELECT username FROM users ORDER BY likes DESC LIMIT 5;';
                        $username_5_result = mysqli_query($db, $username_5_sql);

                        while ($row = mysqli_fetch_array($username_5_result)) {
                            $username_5 = $row['username'];
                        }

                        echo $username_5;
                    ?>
                </p>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $sql_likes_5 = 'SELECT likes FROM users ORDER BY likes DESC LIMIT 5;';
                        $result_likes_5 = mysqli_query($db, $sql_likes_5);

                        while ($row = mysqli_fetch_array($result_likes_5)) {
                            $likes_5 = $row['likes'];
                        }

                        echo $likes_5;
                    ?>
                </p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-12'>
                        <image src="
                            <?php
                                $sql_6 = 'SELECT profileImage FROM users ORDER BY likes DESC LIMIT 6;';
                                $result_6 = mysqli_query($db, $sql_6);

                                while ($row = mysqli_fetch_array($result_6)) {
                                    $profileImage_6 = $row['profileImage'];
                                }

                                if ($profileImage_6 != '') {
                                    echo "profileImages/$profileImage_6";
                                } else {
                                    echo "profileImages/user.png";
                                }
                            ?>
                        " class="placeHolderParent">
                            <img src="images/6.png" class="placeHolder">
                        </image>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $username_6_sql = 'SELECT username FROM users ORDER BY likes DESC LIMIT 6;';
                        $username_6_result = mysqli_query($db, $username_6_sql);

                        while ($row = mysqli_fetch_array($username_6_result)) {
                            $username_6 = $row['username'];
                        }

                        echo $username_6;
                    ?>
                </p>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $sql_likes_6 = 'SELECT likes FROM users ORDER BY likes DESC LIMIT 6;';
                        $result_likes_6 = mysqli_query($db, $sql_likes_6);

                        while ($row = mysqli_fetch_array($result_likes_6)) {
                            $likes_6 = $row['likes'];
                        }

                        echo $likes_6;
                    ?>
                </p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-12'>
                        <image src="
                            <?php
                                $sql_7 = 'SELECT profileImage FROM users ORDER BY likes DESC LIMIT 7;';
                                $result_7 = mysqli_query($db, $sql_7);

                                while ($row = mysqli_fetch_array($result_7)) {
                                    $profileImage_7 = $row['profileImage'];
                                }

                                if ($profileImage_7 != '') {
                                    echo "profileImages/$profileImage_7";
                                } else {
                                    echo "profileImages/user.png";
                                }
                            ?>
                        " class="placeHolderParent">
                            <img src="images/7.png" class="placeHolder">
                        </image>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $username_7_sql = 'SELECT username FROM users ORDER BY likes DESC LIMIT 7;';
                        $username_7_result = mysqli_query($db, $username_7_sql);

                        while ($row = mysqli_fetch_array($username_7_result)) {
                            $username_7 = $row['username'];
                        }

                        echo $username_7;
                    ?>
                </p>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $sql_likes_7 = 'SELECT likes FROM users ORDER BY likes DESC LIMIT 7;';
                        $result_likes_7 = mysqli_query($db, $sql_likes_7);

                        while ($row = mysqli_fetch_array($result_likes_7)) {
                            $likes_7 = $row['likes'];
                        }

                        echo $likes_7;
                    ?>
                </p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-12'>
                        <image src="
                            <?php
                                $sql_8 = 'SELECT profileImage FROM users ORDER BY likes DESC LIMIT 8;';
                                $result_8 = mysqli_query($db, $sql_8);

                                while ($row = mysqli_fetch_array($result_8)) {
                                    $profileImage_8 = $row['profileImage'];
                                }

                                if ($profileImage_8 != '') {
                                    echo "profileImages/$profileImage_8";
                                } else {
                                    echo "profileImages/user.png";
                                }
                            ?>
                        " class="placeHolderParent">
                            <img src="images/8.png" class="placeHolder">
                        </image>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $username_8_sql = 'SELECT username FROM users ORDER BY likes DESC LIMIT 8;';
                        $username_8_result = mysqli_query($db, $username_8_sql);

                        while ($row = mysqli_fetch_array($username_8_result)) {
                            $username_8 = $row['username'];
                        }

                        echo $username_8;
                    ?>
                </p>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $sql_likes_8 = 'SELECT likes FROM users ORDER BY likes DESC LIMIT 8;';
                        $result_likes_8 = mysqli_query($db, $sql_likes_8);

                        while ($row = mysqli_fetch_array($result_likes_8)) {
                            $likes_8 = $row['likes'];
                        }

                        echo $likes_8;
                    ?>
                </p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-12'>
                        <image src="
                            <?php
                                $sql_9 = 'SELECT profileImage FROM users ORDER BY likes DESC LIMIT 9;';
                                $result_9 = mysqli_query($db, $sql_9);

                                while ($row = mysqli_fetch_array($result_9)) {
                                    $profileImage_9 = $row['profileImage'];
                                }

                                if ($profileImage_9 != '') {
                                    echo "profileImages/$profileImage_9";
                                } else {
                                    echo "profileImages/user.png";
                                }
                            ?>
                        " class="placeHolderParent">
                            <img src="images/9.png" class="placeHolder">
                        </image>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $username_9_sql = 'SELECT username FROM users ORDER BY likes DESC LIMIT 9;';
                        $username_9_result = mysqli_query($db, $username_9_sql);

                        while ($row = mysqli_fetch_array($username_9_result)) {
                            $username_9 = $row['username'];
                        }

                        echo $username_9;
                    ?>
                </p>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $sql_likes_9 = 'SELECT likes FROM users ORDER BY likes DESC LIMIT 9;';
                        $result_likes_9 = mysqli_query($db, $sql_likes_9);

                        while ($row = mysqli_fetch_array($result_likes_9)) {
                            $likes_9 = $row['likes'];
                        }

                        echo $likes_9;
                    ?>
                </p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-12'>
                        <image src="
                            <?php
                                $sql_10 = 'SELECT profileImage FROM users ORDER BY likes DESC LIMIT 10;';
                                $result_10 = mysqli_query($db, $sql_10);

                                while ($row = mysqli_fetch_array($result_10)) {
                                    $profileImage_10 = $row['profileImage'];
                                }

                                if ($profileImage_10 != '') {
                                    echo "profileImages/$profileImage_10";
                                } else {
                                    echo "profileImages/user.png";
                                }
                            ?>
                        " class="placeHolderParent">
                            <img src="images/10.png" class="placeHolder">
                        </image>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $username_10_sql = 'SELECT username FROM users ORDER BY likes DESC LIMIT 10;';
                        $username_10_result = mysqli_query($db, $username_10_sql);

                        while ($row = mysqli_fetch_array($username_10_result)) {
                            $username_10 = $row['username'];
                        }

                        echo $username_10;
                    ?>
                </p>
            </div>
            <div class='col-4'>
                <p>
                    <?php
                        $sql_likes_10 = 'SELECT likes FROM users ORDER BY likes DESC LIMIT 10;';
                        $result_likes_10 = mysqli_query($db, $sql_likes_10);

                        while ($row = mysqli_fetch_array($result_likes_10)) {
                            $likes_10 = $row['likes'];
                        }

                        echo $likes_10;
                    ?>
                </p>
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