<?php
// Connection & Authorization Process **STARTS**
session_start();
include("./helper/connect_class.php");
$Connector = new Connectors;
$db=$Connector->phptodbconnector();
$Auth = new Auth;
if(!$Auth->authenticate($_SESSION,$db)){
    unset($_SESSION);
}
// Connection & Authorization Process **ENDS**
include("./helper/home_class.php");
$HomePage = new HomePage;
?>
<!DOCTYPE html>

<head>
    <title>Home Page - Music2Score</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico" />
    <link rel="stylesheet" href="plugins/bootstrap_v4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome_v5.15.2/css/all.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
​

<body>
    <?php include("./components/navbar.php"); ?>
    <div id="carousel" class="carousel slide" data-ride="carousel">
        ​
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ul>
        ​
        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="./images/slide1.jpg" alt="Los Angeles">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/slide2.jpg" alt="Chicago">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./images/slide3.jpg" alt="New York">
            </div>
        </div>
        ​
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#carousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#carousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
        ​
    </div>
    <div class="search_container_outer">
        <div class="search_container_inner">
            <h3 class="search_heading">Find & Search</h3>
            <p class="search_description">Tired of surfing the web, we understand everyone have their own unique taste
                in music and it can be
                difficult to find sheet files. With Music2Score, you can now easily search and find music sheet files
                for the latest, popular and trendy
                music.</p>
            <hr>
            <form action="./browse_search.php" method="POST" class="form-inline" name="search">
                <div class="input-group w-100">
                    <input type="text" class="form-control navbar_search_input" name="query" type="search"
                        placeholder="Search Scores" aria-label="Search">
                    <div class="input-group-append">
                        <button class="input-group-text btn navbar_search_button" type="submit">
                            <span class="fa fa-search navbar_search_icon"></span>
                        </button>
                    </div>
                </div>
            </form>
            <hr>
            <p class="search_suggestions"> Try Searching: Flute, Violin, Mozart, Beethoven.</p>
        </div>
    </div>
    </div>
    <div class="counter_container">
        <div class="row">
            <div class="counter_card col-12 col-md-4">
                <p class="counter_number"><?php echo $HomePage->getUserCount($db); ?>+</p>
                <hr class="counter_divider">
                <p class="counter_heading">Users Served</p>
            </div>
            <div class="counter_card col-12 col-md-4">
                <p class="counter_number"><?php echo $HomePage->getLibraryFileCount($db); ?>+</p>
                <hr class="counter_divider">
                <p class="counter_heading">Library Sheet Files</p>
            </div>
            <div class="counter_card col-12 col-md-4">
                <p class="counter_number"><?php echo $HomePage->getFilesConvertedCount($db); ?>+</p>
                <hr class="counter_divider">
                <p class="counter_heading">Files Converted</p>
            </div>
        </div>
    </div>
    <div class="library_container_outer">
        <div class="library_container_inner">
            <h3 class="library_heading">Sheet Music Library</h3>
            <p class="library_description">Not sure what music to learn next? which music to play next?. We understand
                the feeling therefore at Music2Score we provide an intiutive interface for you to browse through our
                wide collection of sheet music.</p>
            <hr>
            <div class="library_card_container">
            </div>
            <hr>
            <a href="./browse_recent.php?page=1">
                <button class="library_button"> View More</button>
            </a>
        </div>
    </div>
    <div class="feedback_container_outer">
        <div class="feedback_container_inner">
            <form action="./contactus.php" method="POST">
                <div class="row">
                    <div class="col-12">
                        <h3 class="feedback_heading">Leave A Feedback!</h3>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="email" class="feedback_label">Email:</label>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="text" id="email" name="email" placeholder="John@Doe.com"
                            class="form-control feedback_input" value="">
                    </div>
                    ​
                    <div class="col-12 col-md-6">
                        <label for="text" class="feedback_label">Message:</label>
                    </div>
                    <div class="col-12 col-md-6">
                        <textarea rows="7" placeholder="Write Your Message (Max: 65535 Chars.)" maxlength="65535"
                            class="form-control feedback_input" name="text" class=""></textarea>
                    </div>
                    <div class="col-12">
                        <input id="contactbtn" name="contactbtn" type="submit"
                            class="btn btn-default feedback_submit_button" value="Submit">
                    </div>
                    <div class="clear"></div>
                    ​
                </div>
            </form>
        </div>
    </div>
    <div class="about_container_outer">
        <div class="about_container_inner">
            <h3 class="about_heading">Our Team</h3>
            <p class="about_description">Our Team consist of 6 talented individuals namely Christopher Gus Mannes,
                Ibrahim Hassan, Mudit Singh, Sai Anurag, Yi Cai, Ze Sheng. If you like our work and need help for
                similar projects, feel free to contact us through linkedin.</p>
            <a href="./aboutus.php">
                <button class="about_button">More About Us</button>
            </a>
            <br><br><br>
            <hr>
            <div class="about_thankyou_container">
                <p class="about_thankyou_text">Thank You!</p>
            </div>
            <hr>
            ​
        </div>
    </div>
    <?php include("./components/footer.php"); ?>
</body>
<script src="plugins/jquery_v3.5.1/js/jquery.min.js"></script>
<script src="plugins/bootstrap_v4.0/js/bootstrap.min.js"></script>
<script src="js/index.js"></script>
​

</html>