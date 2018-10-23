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
<body class="w3-light-grey">
<?php getNav();?>

    <main role="main" class="container-fluid w3-white w3-padding-64 w3-animate-opacity">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                      <div class="text-center">
                          <?php getAccountInfo($_SESSION['uid']);?>
                      </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div>
        <hr>
        <div>
<?php if(!isset($_GET['alert'])){
    $alert = "";
}else{
    $alert = $_GET['alert'];
    ?><div class="row"><div class="col-sm-12"><section class="alert"><?php echo $alert;?></section></div></div>
<?php
}
?> 
            <div class="text-center w3-padding"><?php getUserOrgs($_SESSION['uid']);?></div>
            <div class="row text-center">
                <div class="col-sm-6"><span class="btn btn-outline-primary w3-padding w3-margin-bottom" onclick="document.getElementById('joinOrg').style.display='block'">Join Organization</span></div>
                <div class="col-sm-6"><span class="btn btn-outline-primary w3-padding w3-margin-bottom" onclick="document.getElementById('createOrg').style.display='block'">Create Organization</span></div>
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
                        <?php if(empty($_SESSION['email']))
                                 {
                                     $email = '';
                                    }else{
                                     $email = $_SESSION['email'];
                                 }
                        ?>
                        <input type="text" placeholder="Organization Name" name="orgEmail" value="<?php echo $email;?>" class="form-control">
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