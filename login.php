<?php
session_start();
if(isset($_SESSION['loginid'])){
    header("location:path.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>The Stage! : Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

    <!-- Custom styles for this template -->
    <style type="text/css">
        body,html {
            height:100%;
        }
        body,h1 {font-family: "Raleway", sans-serif}
        .bgimg {
            background-image: url('media/images/goldbg3.jpg');
            min-height: 100%;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>


<body class="w3-black">
        <div class="bgimg w3-display-container w3-animate-opacity">
          <div class="w3-display-topleft w3-padding-large w3-xlarge">
            The Stage!
          </div>
          <div class="w3-display-middle w3-white" style="min-width:400px;">
            <div class="w3-padding-64 w3-margin w3-center">
                <?php if(isset($_GET['alert'])){echo $_GET['alert'];}?>
            <h1 class="w3-animate-top">PLEASE LOG IN</h1>
            <hr class="w3-border-grey" style="margin:auto;width:40%">
                <form action="loginReg.php" method="post">
            <h4><input type="text" name="email" placeholder="Email"></h4>
              <h4><input type="password" name="pwd"  placeholder="Password"></h4>
                <input type="submit" name="login" value="Log In" class="w3-btn w3-blue">
                </form>
                <div class="col-sm-4" onclick="document.getElementById('register').style.display='block'">
                    <p class="text-center w3-hover-blue">New User?</p>
                </div>
                <div class="col-sm-12 text-center"><a href="index.php"><b>Explore The Stage!</b></a></div>
          </div>
          </div>
          <div class="w3-display-bottomleft w3-padding-large">
            Powered by <a href="https://www.cagency.net" target="_blank">crawley creative agency</a>
          </div>
        </div>
        <div id="register" class="w3-modal">
            <div class="w3-modal-container container w3-white w3-card">
                    <div class="w3-padding-64 w3-margin w3-center">
                    <h1 class="w3-animate-top">New User?</h1>
                    <hr class="w3-border-grey" style="margin:auto;width:40%">
                        <form action="loginReg.php" method="post">
                            <h4><input type="text" placeholder="First Name" name="fname"></h4>
                            <h4><input type="text"  placeholder="Last Name" name="lname"></h4>
                            <h4><input type="text" placeholder="Email" name="email"></h4>
                            <h4><input type="password"  placeholder="Password" name="pwd"></h4>
                            <input type="submit" value="Register" name="register" class="w3-btn w3-blue">
                        </form>
                        <div class="col-sm-4" onclick="document.getElementById('register').style.display='none'">
                            <p class="text-center w3-hover-red">Close</p>
                        </div>
                  </div>
            </div>
    </div>
<!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
