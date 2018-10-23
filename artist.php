<?php
session_start();
include 'inc/get.php';
include 'class/ArtistInfo.php';
include 'class/UserAccount.php';
getHead();
getNav();
$org = new Organiz;
?>
<body id="body" class="w3-animate-opacity">
<div class="w3-padding container" style="margin:auto;">
            <?php if(!isset($_GET['alert'])){
                $alert = "";
            }else{
                $alert = $_GET['alert'];
                ?><div class="row"><div class="col-sm-12"><section class="alert"><?php echo $alert;?></section></div></div>
            <?php
            }
            ?>
    <?php
    if(isset($_GET['orgID'])){?>
        <div class="row">
            <div class="col-sm-6">
            <?php $org->getBasicInfo($_GET['orgID']);?>
                <!--Subscribe Button -->
                <?php
                if(isset($_SESSION['uid'])){
                  isSubscribed($_GET['orgID'],$_SESSION['uid']);
                }
                ?>
                <h4 class="">Credentials</h4>
                <ul style="list-style:none;">
                  <li>Label: </li>
                  <li>Tags: Neo Hip Hop</li>
                </ul>
              </div>
              <div class="col-sm-5">
              <div class="row w3-padding">
              <h4 id="title" class="w3-wide" style="color:#c2a23a;">Brand New Music</h4>
              <div class="primary-bg w3-round w3-display-container" style="background-color:black;">
                  <?php $org->getLatestSingle($_GET['orgID']);?>
              </div>
              </div>
                <?php $org->getLatestVideo($_GET['orgID']);?>

            </div>
        </div>
            <hr>
            <div class="row">
                <div class="col-sm-12"><h3 id="title" class="w3-wide" style="color:#c2a23a;">My Music</h3></div>
                <?php $org->getAllMusic($_GET['orgID']);?>
            </div>
        <hr>
            <div class="w3-padding">
                <div class="row">
                  <h3 style="color:#c2a23a;">Artist on Tour</h3>
                </div>
                <div class="row">
                  <h3 style="color:#c2a23a;">Playlists</h3>
                </div>
                <div class="row">
                  <h3 style="color:#c2a23a;">Related Artists</h3>
                </div>
                <div class="row">
                  <h3 style="color:#c2a23a;">You May Also Like</h3>
                </div>
                </div>
<?php }else{?>
    <h1 class="w3-text-white">No Brand Has Been Selected!</h1>
    <h2 class="w3-text-white">Who are you looking for?</h2>
    <?php
} ?>
</div>
</body>
<?php getFooter();?>
