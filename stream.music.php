<?php
session_start();
include 'inc/get.php';
include 'class/ArtistInfo.php';
$organiz = new Organiz;
getHead();
getNav();
$art = $_GET['art'];
?>
//users who found music from a page other than artist.php will stream embeded music here
//option 1 send the orgID, audio type, typeRowID, trackName, trackArtFile with a GET request
//display track name and art file first
<div class="container">
    <div class="row">
        <div class="col-sm-12 w3-text-white text-center">
            <h1 class="display-4 text-center"><?php $organiz->getBasicInfo($_GET['orgID']);?></h1>
            <button class="btn-outline-primary" onclick="window.location.replace('artist.php?orgID=<?php echo $_GET['orgID'];?>')">View Full Page</button>
        </div>
    </div>
    <hr class="w3-clear">
    <div class="row">
        <div class="col-sm-12 w3-text-white"><h1 id="title" class="text-center"><?php echo $_GET['trackName'];?></h1></div>
    </div>
    <div class="row">
        <div class="col-sm-12 w3-display-container" class="w3-image" style="width:100%;height:300px;background-image:url('media/images/<?php echo $art;?>');background-size:cover;">
            <div class="w3-display-middle">
        <?php
        //use switch statement to:
        //A. load player: spotify, soundcloud,etc and
        //B. grab audio key from player table
            $typeRowID = $_GET['typeRowID'];
            $organiz->getEmbededSong($_GET['type'],$typeRowID,$_GET['orgID']);
        ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center w3-padding-32">
            <h5 class="w3-text-white">Comment</h5>
            <div class="container w3-text-white text-left">
                <div class="row">
                    <b class="">Name </b>  ccnwavier vfinb teb bk.d tbtbccnwavier vfinb teb bk.d tbtbccnwavier vfinb teb bk.d tbtb
                </div>
                <div class="row">
                   <span class="w3-small w3-text-lightgrey">1 hr</span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php getFooter();?>
