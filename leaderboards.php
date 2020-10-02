<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Art Contest | Leaderboards | Challenge your art skills with other artists and win special prizes</title>
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

        <div class='row leaderboardsTop leaderboards'>
            <div class='col-12'>
                <h4 class='text-center mb-3 leaderboardsTitle'>Leaderboards</h4>
            </div>
            <div class='col-4 topInfo first'>
                <h3>1<span id='st'>st</span></h3>
            </div>
            <div class='col-4'>
                <img class='img-fluid firstImage' src='images/first.png'>
            </div>
            <div class='col-4 topInfo total'>
                <p class='score'><b>1255</b></p>
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
                    <div class='col-6 placeHolder'>
                        <p>1</p>
                    </div>
                    <div class='col-6 smallIconContainer'>
                        <img src='images/first.png' class='smallIcon'>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>MaryLovely</p>
            </div>
            <div class='col-4'>
                <p>1255</p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-6 placeHolder'>
                        <p>2</p>
                    </div>
                    <div class='col-6 smallIconContainer'>
                        <img src='images/second.png' class='smallIcon'>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>ChelseaArts</p>
            </div>
            <div class='col-4'>
                <p>1102</p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-6 placeHolder'>
                        <p>3</p>
                    </div>
                    <div class='col-6 smallIconContainer'>
                        <img src='images/third.png' class='smallIcon'>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>BobRoss</p>
            </div>
            <div class='col-4'>
                <p>1007</p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-6 placeHolder'>
                        <p>4</p>
                    </div>
                    <div class='col-6 smallIconContainer'>
                        <img src='images/fourth.png' class='smallIcon'>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>ApostrophePe</p>
            </div>
            <div class='col-4'>
                <p>994</p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-6 placeHolder'>
                        <p>5</p>
                    </div>
                    <div class='col-6 smallIconContainer'>
                        <img src='images/fifth.png' class='smallIcon'>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>CantGrowMore</p>
            </div>
            <div class='col-4'>
                <p>885</p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-6 placeHolder'>
                        <p>6</p>
                    </div>
                    <div class='col-6 smallIconContainer'>
                        <img src='images/sixth.png' class='smallIcon'>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>MiamiDreamin</p>
            </div>
            <div class='col-4'>
                <p>738</p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-6 placeHolder'>
                        <p>7</p>
                    </div>
                    <div class='col-6 smallIconContainer'>
                        <img src='images/seventh.png' class='smallIcon'>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>DancinDroppin</p>
            </div>
            <div class='col-4'>
                <p>720</p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-6 placeHolder'>
                        <p>8</p>
                    </div>
                    <div class='col-6 smallIconContainer'>
                        <img src='images/eighth.png' class='smallIcon'>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>SmellyArtist</p>
            </div>
            <div class='col-4'>
                <p>638</p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-6 placeHolder'>
                        <p>9</p>
                    </div>
                    <div class='col-6 smallIconContainer'>
                        <img src='images/nineth.png' class='smallIcon'>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>TopPlayer</p>
            </div>
            <div class='col-4'>
                <p>550</p>
            </div>
            <div class='col-12'>
                <img src='images/divider.png' class='img-fluid divider'>
            </div>
            <div class='col-4'>
                <div class='row'>
                    <div class='col-6 placeHolder'>
                        <p>10</p>
                    </div>
                    <div class='col-6 smallIconContainer'>
                        <img src='images/tenth.png' class='smallIcon'>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <p>MonsterCookie</p>
            </div>
            <div class='col-4'>
                <p>530</p>
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