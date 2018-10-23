<?php
session_start();
if(!isset($_SESSION['loginid'])){
session_destroy();
header('location:login.php');
exit;
}
if(isset($_SESSION['uid'])){
header('location:user.php');
exit;
}
include_once('inc/get.php');
include_once('class/UserAccount.php');
if(isset($_GET['alert'])){
    $alert = $_GET['alert'];
}else{
    $alert = '';
}
?>
<?php getHead();?>
<body>
<?php getNav();?>

    <main role="main" class="container">

      <div class="text-center">
          <div class="row w3-white"><div class="col-sm-12"><span class="alert">ALERT:<?php echo $alert;?></span></div></div>
          <?php verifyAccountExists($_SESSION['loginid']);?>
      </div>

    </main><!-- /.container -->


<?php getFooter();?>
