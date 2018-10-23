<?php
session_start();
include 'inc/get.php';
include 'class/Homepage.php';
getHead();
getNav();
$home = new Homepage;
?>
<body id="" class="w3-animate-opacity">
    <div class="w3-display-container" style="background-image: url('media/images/goldbg3_o.jpg');height:150px;background-position: top;background-size: cover;">
        <div class="w3-display-middle text-center"><b><a id="TheStage" href="index.php" style="text-decoration:none;">
            <h1 id="title" class="w3-xxxlarge w3-wide w3-text-white w3-border-bottom" style="">The Stage!</h1></a></b></div></div>
    <div class="w3-padding container" style="margin:auto;">
        <div class="row">
            <div class="col-sm-12">

              </div>
        </div>
            <div class="w3-row text-center w3-padding-64">
              <div class="w3-padding">
                  <h2 id="title" class="w3-wide w3-text-white" style=""><b>Brand New Video</b></h2>
              <div class="w3-round" style="">
                <?php $home->getLatestOrgVideo();?>  
              </div>
              </div>
            </div>
        <hr>
        <div class="w3-row text-center">
              <div class="">
                  <h2 id="title" class="w3-wide w3-text-white" style=""><b>Brand New Music</b></h2>
            </div>
                <div class="primary-bg w3-round" style="">
                  <div class="container"><?php $home->getLatestTopMusic();?></div>
                </div>
        </div><br><hr>
            <div class="row">
                <div class="col-sm-12 text-center"><h2 id="title"  style="color:white;">Featured Music</h2></div></div>
                <div class="row" style=""><?php $home->getAllLatestMusic();?></div>
        <hr>
            <div class="row">
                <div class="col-sm-12"><h3 style="color:#c2a23a;">Merch</h3></div></div>
                <div class="row" style=""><?php ?></div>
        <hr>
    </div>
</body>
<?php getFooter();?>
