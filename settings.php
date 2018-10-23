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
include_once('inc/get.php');
include_once('class/UserAccount.php');
?>
<?php getHead();?>
<body>
<?php getNav();?>

    <main role="main" class="container w3-white w3-padding-64 w3-animate-opacity">

      <div class="text-center">
          <h2>Your Profile Settings</h2>
          <h2><?php getAccountInfo($_SESSION['uid']);?></h2>
      </div>
        <hr>
        <div>
        <?php if(!isset($_GET['alert'])){
            $alert = "";
        }else{
            $alert = $_GET['alert'];
            ?><div class="row"><div class="col-sm-12"><section class="alert alert-warning"><?php echo $alert;?></section></div></div>
        <?php
        }
        ?> 
        </div>
        Profile Picture
        <?php
        profileSettings($_SESSION['uid'],$_SESSION['loginid']);
        ?>
    </main>
</body>
<?php getFooter();?>