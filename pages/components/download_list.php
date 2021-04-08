<?php 
// Connection & Authorization Process **STARTS**
session_start();
include("./../helper/connect_class.php");
$Connector = new Connectors;
$db=$Connector->phptodbconnector();
$Auth = new Auth;
if(!$Auth->authenticate($_SESSION,$db)){
    unset($_SESSION);
}
if(!$Auth->is_authenticated()){
    header("Location: /login.php");
}
// Connection & Authorization Process **ENDS**


include("./../helper/downloader_class.php");
$Downloader = new Downloader;
if($Downloader->generateRecentListing($db,$_SESSION["id"])){
for($i=0;$i<$Downloader->getLength();$i++){ 

?>
<div class="col-12 content_row">
    <hr>
    <div class="row">
        <div class="col-12 col-md-6">
            <p><b>Job No:</b> <?php echo $Downloader->getJobNo($i); ?>.</p>
        </div>
        <div class="col-12 col-md-6">
            <p><b>Date/Time:</b>&nbsp; <?php echo $Downloader->getDate($i); ?></p>
        </div>
    </div>
    <div class="row">
        <div class="status col-12 col-md-6">
            <p><b>Status:</b> <?php echo $Downloader->getStatus($i); ?></p>
        </div>
        <div class="col-12 col-md-6">
            <?php if($Downloader->getStatus($i)=="Completed"){ ?>
            <button type="button" class="button_class viewbtn"
                onclick="window.location.href='./sheet_view.php?jobno=<?php echo $Downloader->getJobNo($i); ?>&page=1';">View</button>
            <button type="button" class="button_class downloadbtn"
                onclick="window.location.href='./sheet_download.php?jobno=<?php echo $Downloader->getJobNo($i); ?>';">Download</button>
            <?php }else{ ?>
            <p>Please Wait...</p>
            <?php } ?>
        </div>
    </div>
</div>
<?php 
}
}else{
?>
<div class='connection_error'>
    <h4 class='connection_error_text'><?php echo $Downloader->getErrorTxt(); ?></h4>
</div>
<?php } ?>