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
include_once('class/features.php');
?>
<?php getHead();?>
<body class="w3-light-grey">
<?php getNav();?>

    <main role="main" class="container-fluid w3-white w3-padding-64 w3-animate-opacity">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                      <div class="text-center">
                          <?php getAccountInfo($_SESSION['uid']);?><br>
                          <a href="home.php"><div class="text-center w3-padding">
                              <button class="btn btn-primary">Manage Brands</button></div></a>
                      </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="row"><div class="col-sm-12 text-center">
            <?php 
            if(!isset($_GET['alert'])){
                $alert = "";
                ?>
                <section class="alert"><?php echo $alert;?></section>
                <?php
                }else{
                $alert = $_GET['alert'];
                ?><section class="alert"><?php echo $alert;?></section>
            <?php
}
                ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                        <h2><b>Subscriptions</b></h2>
                        <!--In this section, artists who the user subscribes to will show up here. It will be the organization's banner with a link to its page.-->
                        <div style="width:100%;max-height:500px;overflow-y:auto;overflow-x:hidden;"><?php userOrgSubscriptionInfo($_SESSION['uid']);?></div>
                    </div>
                <div class="col-sm-4">
                    <h2><b>Shop</b></h2>
                    <p>In this section, featured products from the site will be shown. Could be either popular products or advertised products</p>
                  </div>
                <div class="col-sm-4">
                    <h2><b>The Community</b></h2>
                    <!--In this section, there will be a timeline of the latest posts for music and videos, as well as milestones completed.-->
                    <h3>New Music</h3>
                    <?php communityMilestonesMusic();?>
                    <h3>New Visuals</h3>
                    <?php communityMilestonesVideo();?>
                    <h3>Milestones</h3>
                    <?php ?>
                </div>
            </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-4"><section class=""><h4></h4></section></div>
            <div class="col-sm-4"><section class=""><h4></h4></section></div>
        </div>
<!-- Place Modals Here -->
        <div id="createOrg" class="w3-modal">
            <div class="w3-modal-container container w3-white">
                <div class="w3-padding-64">
                    <h2>Create Your New Brand</h2>
                <form action="forms/orgForms.php" method="post">
                    
                    <h4>
                        <label>Type of Organization:</label>
                          <select name="orgType" class="form-control">
                            <option value="artist">Individual Artist</option>
                            <option value="group">Group</option>
                          </select>
                    </h4>
                    
                    <h5>
                        <label>Name of Organization:</label>
                        <input type="text" placeholder="Organization Name" name="orgName" class="form-control">
                        <label>Organization Email:</label>
                        <input type="text" placeholder="Organization Name" name="orgEmail" value="<?php echo $_SESSION['email'];?>" class="form-control">
                    </h5>
                        <input type="submit" name="createOrg" value="Create" class="btn btn-primary">
                </form>
                <div class="col-sm-4" onclick="document.getElementById('createOrg').style.display='none'">
                    <p class="text-center w3-hover-red">Cancel</p>
                </div>
                </div>
            </div>
        </div>
        <div id="joinOrg" class="w3-modal">
            <div class="w3-modal-container container w3-white">
                <div class="w3-padding-64">
                    <h2>Joining an Organization?</h2>
                <form>
                    
                    <h4>
                        <label>Codename</label>
                        <input type="text" placeholder="" name="OrgCode" class="form-control">
                    </h4>
                    
                    <h5>
                        <label>Passcode</label>
                        <input type="text" placeholder="" name="OrgPass" class="form-control">
                    </h5>
                        <input type="submit" name="joinOrg" value="Join" class="btn btn-primary">
                </form>
                <div class="col-sm-4" onclick="document.getElementById('joinOrg').style.display='none'">
                    <p class="text-center w3-hover-red">Cancel</p>
                </div>
                </div>
            </div>
        </div>
    </main><!-- /.container -->


<?php getFooter();?>