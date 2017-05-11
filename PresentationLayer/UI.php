<?php


if(isset($_POST["inputEmail"]) && isset($_POST["inputPassword"]))
{
    require_once("LogicLayer/UserManagement.php");
    $inputEmail=trim($_POST["inputEmail"]);
    $inputPassword=trim($_POST["inputPassword"]);
    UserManagement::loginUser($inputEmail,$inputPassword);
}
else{

}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tiyatro Dünyası</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/new.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .mySlides {display:none;}
    </style>
</head>
<body style="background-color: silver">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid" style="background-color: white">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-link navbar-right" >
                <a class="label label-info" style="color: #0f0f0f" href="#">About Us</a>
                <a class="label label-info" style="color: #0f0f0f" href="#">Contact Us</a>
                <a class="label label-info" style="color: #0f0f0f" href="#">Help</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="h1" style="color: white" href="#" >Tiyatro Dünyası</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <form class="navbar-form navbar-right" method="post" action="<?php $_PHP_SELF ?>">
                    <a href="PresentationLayer/Register.php" class="btn btn-warning" >Sıgn Up</a>
                    <div class="form-group">
                        <input type="text" class="form-control" name="inputEmail" placeholder="E-Mail">
                    </div>
                    <div class="form-group">
                        <input type="password" id="inputPassword" name="inputPassword" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-warning" name ="btn-sign">Sign In</button>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <br/>
    <br/>
    <div class="w3-content w3-section" style="max-width:800px">
        <img class="mySlides" src="Images/1.jpg" style="width:100%">
        <img class="mySlides" src="Images/2.jpg" style="width:100%">
    </div>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}
            x[myIndex-1].style.display = "block";
            setTimeout(carousel, 2000); // Change image every 2 seconds
        }
    </script>
</body>
</html>
