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
                <?php
                    if(!isset($_GET['type'])){
                        echo "<h2>Which platform would you like to manage?</h2>";
                        ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="manageOrgVideo.php?orgID=<?php echo $_GET['orgID'];?>&type=youtube">
                                            <span class="">Youtube</span><br><br>
                                            <img src="media/favicon/youtube_glyph.png" style="width:200px;"><br>
                                        </a>
                                    </div>
                                </div>
                    <?php
                        exit;
                    }
                ?>
                <?php 
                if(!isset($_GET['alert'])){
                            $alert = "";
                            }
                else{
                                $alert = $_GET['alert'];
                                ?><div class="row"><div class="col-sm-12"><section class="alert"><?php echo $alert;?></section></div></div>
                            <?php
                            }
                ?>
<!-- display type banner-->     
                <?php 
                switch($_GET['type']){
                    case "youtube":{?>
                                <div class="row">
                                    <div class="col-sm-12"><img src="media/favicon/youtube_glyph.png" style="width:200px;"></div>
                                </div><hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button onclick="document.getElementById('uploadYoutube').style.display='block'" class="btn btn-primary">Upload New Video</button>
                                        <div id="uploadYoutube" class="w3-modal">
                                            <div class="w3-modal-container container w3-white w3-padding-64 w3-animate-opacity">
                                                <h3>New YouTube Video</h3>
                                                <p class="w3-small"><b>Embed Code can be found by the share button on your track on soundcloud.</b></p>
                                                <p class="lead w3-text-green">Tips</p>
                                                <form action="forms/uploadMedia.php" method="post" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                <label for="Company">Enter Name of Video</label>
                                                                <p class=""></p>
                                                                <input type="text" class="form-control" name="name" placeholder="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Company">Paste Video's Share Link</label>
                                                                    <p class="w3-small">https://youtu.be.com/sHvR3-L!nK</p>
                                                                    <input type="text" class="form-control" name="embedCode" placeholder="https://youtu.be.com/sHvR3-L!nK">
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="comment">Enter Description</label>
                                                                <p class=""></p>
                                                                <textarea class="form-control" name="description" id="comment"></textarea>
                                                                </div>
                                                    <input type="hidden" name="type" value="youtube">
                                                    <input type="hidden" name="orgID" value="<?php echo $_GET['orgID'];?>">
                                                    <input type="submit" name="uploadYoutube" value="Upload Video">
                                                </form>
                                                <p class="btn w3-hover-red text-center" onclick="document.getElementById('uploadYoutube').style.display='none'">cancel</p>
                                            </div>
</div>
                                    </div>
                                </div>
                                <h2>Your Media</h2>
                        <?php break;}}
                ?>
<!-- Display current videos -->
                <?php getVideo($_GET['type'],$_GET['orgID']);?>
            </div>
        </div>
    </main>
</body>
<?php getFooter();?>
                        