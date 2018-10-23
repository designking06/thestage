<?php
session_start();
if(!isset($_SESSION['loginid'])){
header('location:login.php');
exit;
}
if(!isset($_SESSION['uid'])){
header('location:path.php');
exit;
}
if(!isset($_GET['orgID'])){
   header('location:index.php');
    exit;
}
include_once('inc/get.php');
include_once('class/UserAccount.php');
?>
<?php getHead();?>
<body>
<?php getNav();?>

    <main role="main" class="container-fluid w3-white w3-padding-64">
        <div class="container">
            <?php if(!isset($_GET['alert'])){
                $alert = "";
            }else{
                $alert = $_GET['alert'];
                ?><div class="row"><div class="col-sm-12"><section class="alert"><?php echo $alert;?></section></div></div>
            <?php
            }
            ?>
            <?php getOrgInfo($_GET['orgID']);?>
            <div class="row"><div class="col-sm-12 text-center"><a href="artist.php?orgID=<?php echo $_GET['orgID'];?>"><button class="form-control btn-primary">View Your Page</button></a></div></div>
            <div class="row">
            <div class="col-sm-10">
            <h2>Content</h2>
            <h3 class="">Manage Content</h3>
            <p>Select An Option to Manage|Add</p>
            <h4>Music</h4>
            <div class="row text-center">
                <div class="col-sm-4 w3-padding"><a href="manageOrgMusic.php?orgID=<?php echo $_GET['orgID'];?>&type=soundcloud">Soundcloud<br><img src="media/favicon/soundcloud_glyph.png" style="width:100px;"></a></div>
                <div class="col-sm-4 w3-padding"><a href="manageOrgMusic.php?orgID=<?php echo $_GET['orgID'];?>&type=spotify">Spotify<br><br><img src="media/favicon/spotify_glyph.png" style="width:75px;"></a></div><br><br>
                <div class="col-sm-4 w3-padding"><a href="manageOrgMusic.php?orgID=<?php echo $_GET['orgID'];?>&type=livemixtapes">Live Mixtapes<br><img src="media/favicon/livemixtapes.png" style="width:125px;"></a></div>
            </div>
            <h4>Video</h4>
            <div class="row text-center"><div class="col-sm-12"><a href="manageOrgVideo.php?orgID=<?php echo $_GET['orgID'];?>&type=youtube"><img src="media/favicon/youtube_glyph.png" style="width:150px;"></a></div></div>
        <hr>
        </div>
        <div class="col-sm-2 text-center">
            <div class="w3-card w3-padding w3-light-grey" style="max-height:250px;">
            <div class="w3-padding w3-hide-medium" style="">
            <h2>Promote Your Brand</h2>
            <div class="row">
                <div class="col-sm-12"><button class="btn w3-red w3-padding">Create Ad</button></div>
            </div>
            </div>
            <div class=" w3-padding w3-hide-small w3-hide-large" style="padding:50 0 0 0;">
                <p>Promote Your Brand</p>
                <p class="w3-text-red w3-hover-red">Create Ad</p>
        </div>
            
                <p class="w3-text-blue">Learn More</p>
            </div>
        <hr>
            <div class="w3-card w3-padding w3-light-grey" style="max-height:300px;">
            <div class="w3-padding w3-hide-medium" style="">
            <h2>My Shop</h2>
                <?php orgVendorAuth($_GET['orgID']); ?>
            </div>
            <div class=" w3-padding w3-hide-small w3-hide-large" style="padding:50 0 0 0;">
                <p>My Shop</p>
                <?php orgVendorAuth($_GET['orgID']); ?>
        </div>
            
                <p class="w3-text-blue">Learn More</p>
            </div>
            </div>
        </div>
        <!-- Music Modals-->
        <div id="uploadSoundcloud" class="w3-modal">
            <div class="w3-modal-container container w3-white w3-padding-64 w3-animate-opacity">
                <h3>New Music: Soundcloud</h3>
                <p class="w3-small"><b>Embed Code can be found by the share button on your track on soundcloud.</b></p>
                <p class="lead w3-text-green">Tips</p>
                <form action="forms/uploadMedia.php" method="post">
                    <input type="text" name="name" placeholder="Name of Song" class="form-control" required><br>
                    <p><b>Please Copy And Paste The ENTIRE Souncloud Embed Code</b></p>
                    <input type="text" placeholder="Soundcloud Embed Code: Media ID" name="embedCode" class="form-control" required><br>
                    <input type="hidden" name="orgID" value="<?php echo $_GET['orgID'];?>">
                    <input type="submit" name="uploadSoundcloud" value="Upload" class="btn btn-primary">
                </form>
                <p class="btn w3-hover-red text-center" onclick="document.getElementById('uploadSoundcloud').style.display='none'">cancel</p>
            </div>
        </div>
        <div id="uploadLiveM" class="w3-modal">
            <div class="w3-modal-container container w3-white w3-padding-64 w3-animate-opacity">
                <h3>New Music: Live Mixtapes</h3>
                <p class="w3-small"><b>Embed Code can be found by streaming the track/tape pop up live mixtapes.</b></p>
                <p class="lead w3-text-green">Tips</p>
                <form action="forms/uploadMedia.php" method="post">
                    <input type="text" name="name" placeholder="Name of Song" class="form-control" required><br>
                    <p><b>Please Copy And Paste The ENTIRE Live Mixtapes Embed Code</b></p>
                    <input type="text" placeholder="Live Mixtapes Embed Code: Media ID" name="embedCode" class="form-control" required><br>
                    <input type="hidden" name="orgID" value="<?php echo $_GET['orgID'];?>">
                    <input type="submit" name="uploadLiveM" value="Upload" class="btn btn-primary">
                </form>
                <p class="btn w3-hover-red text-center" onclick="document.getElementById('uploadLiveM').style.display='none'">cancel</p>
            </div>
        </div>
        <!-- Video Modals -->
        <div id="uploadYoutube" class="w3-modal">
            <div class="w3-modal-container container w3-white w3-padding-64 w3-animate-opacity">
                <h3>New Youtube Video</h3>
                <p class="lead w3-text-green">Tips</p>
                <form action="forms/uploadMedia.php" method="post">
                    <input type="text" mame="name" placeholder="Name of Video" class="form-control" required><br>
                    <input type="text" placeholder="Youtube Embed Code: Video ID" name="embedCode" class="form-control" required><br>
                    <textarea class="form-control">Description of Video</textarea><br>
                    <input type="hidden" name="orgID" value="<?php echo $_GET['orgID'];?>">
                    <input type="submit" name="uploadYoutube" value="Upload" class="btn btn-primary">
                </form>
                <p class="btn w3-hover-red text-center" onclick="document.getElementById('uploadYoutube').style.display='none'">cancel</p>
            </div>
        </div>
        <div id="uploadCustom" class="w3-modal">
            <div class="w3-modal-container container w3-white w3-padding-64 w3-animate-opacity">
                <h3>New Custom Video</h3>
                <p class="lead w3-text-green">Tips</p>
                <form action="forms/uploadMedia.php" method="post">
                    <input type="text" mame="name" placeholder="Name of Video" class="form-control" required><br>
                    <input type="file" placeholder="Your Video File" name="videoFile" class="form-control" required><br>
                    <textarea class="form-control">Description of Video</textarea><br>
                    <input type="hidden" name="orgID" value="<?php echo $_GET['orgID'];?>">
                    <input type="submit" name="uploadCustom" value="Upload" class="btn btn-primary">
                </form>
                <p class="btn w3-hover-red text-center" onclick="document.getElementById('uploadCustom').style.display='none'">cancel</p>
            </div>
        </div>
<?php getFooter();?>