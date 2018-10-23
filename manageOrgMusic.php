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
getHead();
?>
<body>
<?php
getNav();
    ?>
    <main role="main" class="container-fluid w3-white w3-padding-64">
        <div class="container">
            <div class="text-center">
                <?php if(!isset($_GET['alert'])){
                    $alert = "";
                }else{
                    $alert = $_GET['alert'];
                    ?><div class="row"><div class="col-sm-12"><section class="alert"><?php echo $alert;?></section></div></div>
                <?php
                }
                ?>
                <?php
                    if(!isset($_GET['type'])){
                        echo "<h2>Which platform would you like to manage?</h2>";
                        ?>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="manageOrgMusic.php?orgID=<?php echo $_GET['orgID'];?>&type=soundcloud">
                                            <span class="">Soundcloud</span><br><br>
                                            <img src="media/favicon/soundcloud_glyph.png" style="width:100px;"><br>
                                        </a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="manageOrgMusic.php?orgID=<?php echo $_GET['orgID'];?>&type=spotify">
                                            <span class="">Spotify</span><br><br>
                                            <img src="media/favicon/spotify_glyph.png" style="width:75px;">
                                        </a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="manageOrgMusic.php?orgID=<?php echo $_GET['orgID'];?>&type=livemixtapes">
                                            <span class="">Live Mixtapes</span><br>
                                            <img src="media/favicon/livemixtapes.png" style="width:125px;">
                                        </a>
                                    </div>
                                </div>
                    <?php
                        exit;
                    }
                ?>
<!-- display type banner-->
                <?php
                switch($_GET['type']){
                    case "soundcloud":{?>
                                <div class="row">
                                    <div class="col-sm-12"><img src="media/favicon/soundcloud_glyph.png" style="width:200px;"></div>
                                </div><hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button onclick="document.getElementById('uploadSoundcloudPage').style.display='block'" class="btn btn-outline-primary">Link Your Page</button><br><br>
                                        <button onclick="document.getElementById('uploadSoundcloud').style.display='block'" class="btn btn-primary">Upload A Song</button>
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
                                        <div id="uploadSoundcloudPage" class="w3-modal">
                                            <div class="w3-modal-container container w3-white w3-padding-64 w3-animate-opacity">
                                                <h3>New Page: Soundcloud</h3>
                                                <p class="w3-small"><b>Embed Code can be found by the share button on your track on soundcloud.</b></p>
                                                <p class="lead w3-text-green">Tips</p>
                                                <form action="forms/uploadMedia.php" method="post">
                                                    <p><b>Please Copy And Paste The ENTIRE Souncloud Embed Code</b></p>
                                                    <input type="text" placeholder="Soundcloud Embed Code: Media ID" name="embedCode" class="form-control" required><br>
                                                    <input type="hidden" name="orgID" value="<?php echo $_GET['orgID'];?>">
                                                    <input type="submit" name="uploadSoundcloudPage" value="Upload" class="btn btn-primary">
                                                </form>
                                                <p class="btn w3-hover-red text-center" onclick="document.getElementById('uploadSoundcloudPage').style.display='none'">cancel</p>
                                            </div>
</div>
                                    </div>
                                </div>

                        <?php break;}
                    case "spotify":{?>
                                <div class="row">
                                    <div class="col-sm-12"><img src="media/favicon/spotify_glyph.png" style="width:150px;"></div>
                                </div><hr>
                        <?php break;}
                    case "livemixtapes":{?>
                                <div class="row">
                                    <div class="col-sm-12"><img src="media/favicon/livemixtapes.png" style="width:250px;"></div>
                                </div>
                                <hr>
                                <div class="row w3-padding">
                                    <div class="col-sm-12">
                                    <button onclick="document.getElementById('uploadLiveM').style.display='block'" class="btn btn-primary">Upload New Media</button>
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
                                    </div>
                                </div>
                        <?php break;}
                }
                ?>
                <h2 class="text-left">Your Page</h2>
                                <div class="row">
                                    <div class="col-sm-4"></div><div class="col-sm-4"><?php getMediaPage($_GET['orgID']);?></div><div class="col-sm-4"></div></div>
                <h2>Your Media</h2>
                                <div class="row"><div class="col-sm-12"><?php getMedia($_GET['type'],$_GET['orgID']);?></div></div>
            </div>
        </div>
    </main>
    <?php getFooter();?>
<!-- display add new media form-->
<!-- display organiz media, edit/delete -->
