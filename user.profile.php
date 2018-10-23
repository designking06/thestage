<?php
session_start();
include 'inc/get.php';
//include 'class/ArtistInfo.php';
include 'class/UserAccount.php';
getHead();
getNav();
$user = new User;
?>
//user profile page
//user info: picture, bio, friends/subscriptions?, message button?
<div class="container-fluid w3-light-grey">
    <div class="container w3-white">
        <div class="row w3-padding-32">
            <div class="col-sm-12 w3-margin text-center">
                <?php $user->getUserInfo($_GET['userID']);?>
                <div class="btn btn-primary" onclick="document.getElementById('message').style.display='block'">Message</div>
            </div>
        </div>
        <div class="w3-padding text-left w3-row-padding">
            <h3>My Brands</h3>
            <?php $user->getUserBrands($_GET['userID']);?>
        </div><hr>
        <div class="w3-padding text-left">
            <h3>My Subscriptions</h3>
            <?php $user->userSubscriptions($_GET['userID']);?>
        </div>
        <div class="w3-padding text-left">
            <h3>My Playlists</h3>
            <?php //$user->userPlaylists($_GET['userID']);?>
        </div>
    </div>
    <!-- modals-->
    <div id="message" class="w3-modal" style="display:none;">
        <div class="w3-modal-container container w3-white">
            <div class="w3-padding-64">
                <h2>Send A Message:</h2>
                Message:<br>
                <textarea class="form-control"></textarea>
            <input type="submit" class="btn btn-primary form-control">
            </div>
        </div>
    </div>
<?php getFooter();?>
<?php
//send message option

//page lists affiliated brands
//subscriptions
//playlists
?>
