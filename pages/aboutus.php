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
?>
<!DOCTYPE html>
<html>

<head>
    <title>AboutUS Page - Music2Score</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico" />
    <link rel="stylesheet" href="plugins/bootstrap_v4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome_v5.15.2/css/all.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/aboutus.css">
</head>

<body>
    <?php include("./components/navbar.php"); ?>
    <div class="team_container_outer">
        <div class="team_container_inner">
            <img src="images/logo.png" class="aboutus_icon" />
            <h2 class="aboutus_heading">Our Vision</h2>
            <p class="aboutus_description">The goal of Music2Score is to facilitate the ability to generate sheet music
                using midi files. We want to eliminate the problem of being able to play music from only a limited
                selection that is commonly available. Also manually searching the internet for the desired sheet music
                is time consuming and tiring. Therefore we created Music2Score to eliminate all those problems while
                adding additional features such as the the ability to convert one’s own unpublished music
            </p>
            <img src="images/navbar_logo.png" class="aboutus_logo" />
            <h2 class="team_heading">Our Team</h2>
            <p class="team_description">Our Team consist of 6 talented individuals namely Christopher Gus Mannes,
                Ibrahim Hassan, Mudit Singh, Sai Anurag, Yi Cai, Ze Sheng. If you like our work and need help for
                similar projects, feel free to contact us through linkedin.</p>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 team_card">
                    <div class="team_image">
                        <img src="./images/christopher_cat.jpg" class="team_image" />
                    </div>
                    <h3 class="team_name">Christopher Gus Mannes</h3>
                    <p class="team_role">Integration Testing (PyTest), Algorithm Analyst (Python), Presenter.</p>
                    <div class="aboutus_button_container col-12">
                        <a target="_blank" href="https://www.linkedin.com/in/christopher-mannes-348356b9/">
                            <button type="button" class="aboutus_linkedin_button">
                                <span class="fab fa-linkedin about_linkedin_icon"></span> Linkedin
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 team_card">
                    <div class="team_image">
                        <img src="./images/ibrahim_cat.jpg" class="team_image" />
                    </div>
                    <h3 class="team_name">Ibrahim Hassan</h3>
                    <p class="team_role">Unit Testing (Visual Regression), Integration & Acceptance Testing
                        (Codeception), Continous Integration
                        (CircleCI), Continous
                        Deployment(GCM), Kubernetes, Github, Presenter.</p>
                    <div class="aboutus_button_container col-12">
                        <a target="_blank" href="https://www.linkedin.com/in/mibrahimhassan/">
                            <button type="button" class="aboutus_linkedin_button">
                                <span class="fab fa-linkedin about_linkedin_icon"></span> Linkedin
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 team_card">
                    <div class="team_image">
                        <img src="./images/mudit_cat.jpg" class="team_image" />
                    </div>
                    <h3 class="team_name">Mudit Singh</h3>
                    <p class="team_role">Front-End Designer (Bootstrap, CSS, HTML, Javascript, JQuery), Back-End Dev
                        (corePHP), Database (MySQL), Graphic Design (Website), Unit Testing (Codeception), Continous
                        Integration
                        (CircleCI), Docker, Kubernetes, Presentation Template, Content Writing.</p>
                    <div class="aboutus_button_container col-12">
                        <a target="_blank" href="https://www.linkedin.com/in/mudit-singh-team/">
                            <button type="button" class="aboutus_linkedin_button">
                                <span class="fab fa-linkedin about_linkedin_icon"></span> Linkedin
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 team_card">
                    <div class="team_image">
                        <img src="./images/sai_cat.jpg" class="team_image" />
                    </div>
                    <h3 class="team_name">Sai Anurag Neelishetty</h3>
                    <p class="team_role">Algorithm Analyst (Python), Unit Testing (PyTest).</p>
                    <div class="aboutus_button_container col-12">
                        <a target="_blank" href="https://www.linkedin.com/in/saianurag">
                            <button type="button" class="aboutus_linkedin_button">
                                <span class="fab fa-linkedin about_linkedin_icon"></span> Linkedin
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 team_card">
                    <div class="team_image">
                        <img src="./images/yi_cat.jpg" class="team_image" />
                    </div>
                    <h3 class="team_name">Yi Cai</h3>
                    <p class="team_role">Algorithm Analyst (Python), Logo Design, Data Analyst (Midi Files).</p>
                    <div class="aboutus_button_container col-12">
                        <a target="_blank" href="https://www.linkedin.com/in/yi-cai-800b8a172">
                            <button type="button" class="aboutus_linkedin_button">
                                <span class="fab fa-linkedin about_linkedin_icon"></span> Linkedin
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 team_card">
                    <div class="team_image">
                        <img src="./images/ze_cat.jpg" class="team_image" />
                    </div>
                    <h3 class="team_name">Ze Sheng</h3>
                    <p class="team_role">Algorithm Analyst (Python), Python Dev.</p>
                    <div class="aboutus_button_container col-12">
                        <a target="_blank" href="https://www.linkedin.com/in/ze-sheng-a389691b2/">
                            <button type="button" class="aboutus_linkedin_button">
                                <span class="fab fa-linkedin about_linkedin_icon"></span> Linkedin
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include("./components/footer.php"); ?>
</body>
<script src="plugins/jquery_v3.5.1/js/jquery.min.js"></script>
<script src="plugins/bootstrap_v4.0/js/bootstrap.min.js"></script>

</html>