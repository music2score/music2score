<div class="footer_divider"></div>
<div class="footer_container">
    <div class="row">

        <div class="col-12 col-md-4 footer_services_container">
            <h5 class="footer_services_heading">Our Services</h5><br>
            <div class="footer_buttons">
                <button class="btn footer_button_browse" onclick="window.location='./browse_recent.php';">Browse
                    Existing Library</button><br>
                <button class="btn footer_button_upload" onclick="window.location='./upload.php';">Upload Your Own
                    File</button>
            </div>
        </div>

        <div class="col-12 col-md-4 footer_links_container">
            <h5 class="footer_links_heading">Site Links</h5><br>
            <div class="footer_links">
                <p><a href="./" <?php echo (($pagename=="index")?'class="footer_links_active"':''); ?>>Home
                    </a>&nbsp;|&nbsp;<a href="./aboutus.php"
                        <?php echo (($pagename=="aboutus")?'class="footer_links_active"':''); ?>> About
                    </a>&nbsp;|&nbsp;<a href="./browse_recent.php"
                        <?php echo ((substr($pagename,0,6)=="browse")?'class="footer_links_active"':''); ?>> Browse
                    </a>&nbsp;|&nbsp;<a href="./contactus.php"
                        <?php echo (($pagename=="contactus")?'class="footer_links_active"':''); ?>> Contact</a></p>
            </div><br>
            <div class="footer_links_search">
                <form action="./browse_search.php" method="POST" class="form-inline my-2 my-lg-0" name="search">

                    <div class="input-group">
                        <input type="text" class="form-control footer_search_input" name="query" type="search"
                            placeholder="Search Scores" aria-label="Search">
                        <div class="input-group-append">
                            <button class="input-group-text btn footer_search_button" type="submit">
                                <span class="fa fa-search footer_search_icon"></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-4 footer_reach_container">
            <h5 class="footer_reach_heading">Reach Us At</h5><br>
            <div class="footer_reach_email"><a href="./contactus.php"
                    class="<?php echo (($pagename=="contactus")?'footer_email_link_active':'footer_email_link'); ?>">info@music2score.com</a>
            </div>
            <div class="footer_reach_social">
                <span class="fab fa-youtube-square footer_reach_icon"></span>
                <span class="fab fa-twitter-square footer_reach_icon"></span>
                <span class="fab fa-facebook-square footer_reach_icon"></span>
                <span class="fab fa-instagram-square footer_reach_icon"></span>
            </div>
        </div>
    </div>
</div>
<div class="footer_divider_gray"></div>
<div class="footer_copyright_container">
    <div class="footer_copyright_text">
        This web portal is restricted to be used by music2score and its testing purposes only.
    </div>
</div>