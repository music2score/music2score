<?php
$pagename = basename($_SERVER['PHP_SELF'], ".php");
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar_container">
    <a class="navbar-brand" href="./">
        <img class="navbar_logo" src="images/navbar_logo.png" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link <?php echo (($pagename=="index")?'navbar_link_active':'navbar_link'); ?>"
                    id= "homebtn" href="./">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (($pagename=="aboutus")?'navbar_link_active':'navbar_link'); ?>"
                    id= "aboutbtn" href="./aboutus.php">About</a>
            </li>
            <li class="nav-item dropdown navbar_dropdown_container">
                <a class="nav-link <?php echo ((substr($pagename,0,6)=="browse")?'navbar_link_active':'navbar_link'); ?> dropdown-toggle browsebtn"
                    id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Browse
                </a>
                <div class="dropdown-menu navbar_dropdown" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item navbar_dropdown_item" id= "mostRecentbtn" href="./browse_recent.php?page=1">Most Recent</a>
                    <a class="dropdown-item navbar_dropdown_item" id = "instrumentbtn" href="./browse_instrument.php?type=All&page=1">By
                        Instrument</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?php echo (($pagename=="contactus")?'navbar_link_active':'navbar_link'); ?>"
                    href="./contactus.php">Contact</a>
            </li>
        </ul>
        <form action="./browse_search.php" method="POST" class="form-inline my-2 my-lg-0" name="search">

            <div class="input-group">
                <input type="text" class="form-control navbar_search_input" name="query" type="search"
                    placeholder="Search Scores" aria-label="Search">
                <div class="input-group-append">
                    <button class="input-group-text btn navbar_search_button" type="submit">
                        <span class="fa fa-search navbar_search_icon"></span>
                    </button>
                </div>
            </div>
        </form>

        <ul class="navbar-nav">
            <?php if($Auth->is_authenticated()){ ?>
            <li class="nav-item dropdown navbar_dropdown_container">
                <a class="nav-link dropdown-toggle navbar_account_button" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                </a>
                <div class="dropdown-menu navbar_account_dropdown" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item navbar_dropdown_item" id="uploadbtn" href="./upload.php">Upload New</a>
                    <a class="dropdown-item navbar_dropdown_item" id="downloadbtn" href="./download.php">My Sheets</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item navbar_dropdown_item" href="./logout.php">Logout</a>
                </div>
            </li>
            <?php }else{ ?>
            <li class="nav-item dropdown navbar_dropdown_container">
                <a class="nav-link dropdown-toggle navbar_account_button" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sign In/Up
                </a>
                <div class="dropdown-menu navbar_account_dropdown" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item navbar_dropdown_item" id="registerbtn" href="./register.php">Register</a>
                    <a class="dropdown-item navbar_dropdown_item" id="loginbtn" href="./login.php">Login</a>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</nav>
<div class="navbar_spacer"></div>