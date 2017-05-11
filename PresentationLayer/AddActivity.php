<?php
session_start();
$nameUser = null;
$idUser=null;
if(isset($_SESSION['nameUser']) &&isset($_SESSION['idUser'])) {
    $nameUser =  $_SESSION['nameUser'];
    $idUser =  $_SESSION['idUser'];
}
if(isset($_POST["actName"]) && isset($_POST["category"]) && isset($_POST["summary"]) && isset($_POST["place"]) ) {

    $actName = trim($_POST["actName"]);
    $summary = trim($_POST["summary"]);
    $date = trim($_POST["date"]);
    $category = trim($_POST["category"]);
    $place = trim($_POST["place"]);
    $city=trim($_POST["city"]);
    $director=trim($_POST["director"]);
    $writer = trim($_POST["writer"]);
    $sponsor = trim($_POST["sponsor"]);
    $seat = trim($_POST["seat"]);
    $price = trim($_POST["price"]);
    $errorMeesage = "";
    echo "içerdyim".$category;
    require_once("../LogicLayer/UserManagement.php");
    $result = UserManagement::insertNewActivity($actName,$summary,$date,$category,$place,$city,$director,$writer,$sponsor,$seat,$price);
    if(!$result) {
        $errorMeesage = "Yeni kullanıcı kaydı başarısız!";
    }
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

    <title>Add Activity</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
    <link href="../css/new.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="../css/signin2.css" rel="stylesheet">


</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid" >
        <div class="navbar-header navbar-right">
            <br>
            <a class="h4" style="color: white">
                <?php
                if(isset($nameUser)) {
                    echo "Welcome " . $nameUser."(Admin)";
                }
                else {
                    echo "Giriş yapınız!";
                }
                ?>

            </a>
        </div><!-- /.container-fluid -->
        <div class=" navbar-left">
            <a class="h1" style=" color: white" href="#" >Tiyatro Dünyası</a><br><br>
        </div>
    </div>

</nav><br>
<div class="dropdown" style="margin-left: 88.2%">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        Options
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a href="Admin.php">Activity List</a></li>
        <li><a href="../index.php">Sign Out</a></li>
    </ul>
</div>
<div class="container" id="addActivity"  >
    <form class="form-horizontal" method="post" role="form" action="<?php $_PHP_SELF ?>">
        <div class="form-group">
            <label for="actName" class="col-sm-3 control-label">Activity Name</label>
            <div class="col-sm-9">
                <input type="text" id="actName" name="actName" class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label for="summary" class="col-sm-3 control-label">Summary</label>
            <div class="col-sm-9">
                <input type="text" id="summary" name="summary" class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label for="date" class="col-sm-3 control-label">Date</label>
            <div class="col-sm-9">
                <input type="date" id="date" name="date" class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label for="category" class="col-sm-3 control-label">Category</label>
            <div class="col-sm-9">
                <input type="text" id="category" name="category" class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label for="place" class="col-sm-3 control-label">Place</label>
            <div class="col-sm-9">
                <input type="text" id="place" name="place" class="form-control" >
            </div>
        </div>

        <div class="form-group">
            <label for="city" class="col-sm-3 control-label">City</label>
            <div class="col-sm-9">
                <input type="text"  id="city" name="city" class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label for="director" class="col-sm-3 control-label">Director</label>
            <div class="col-sm-9">
                <input type="text" id="director" name="director" class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label for="writer" class="col-sm-3 control-label">Writer</label>
            <div class="col-sm-9">
                <input type="text" id="writer" name="writer" class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label for="sponsor" class="col-sm-3 control-label">Sponsor</label>
            <div class="col-sm-9">
                <input type="text" id="sponsor" name="sponsor" class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label for="seat" class="col-sm-3 control-label">Available Seats</label>
            <div class="col-sm-9">
                <input type="number" min="0" max="9999999999" id="seat" name="seat"  class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="col-sm-3 control-label">Price</label>
            <div class="col-sm-9">
                <input type="number" min="0" max="9999999999" id="price" name="price" class="form-control" >
            </div>
        </div>

        <div class="form-group" >
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-primary btn-block">Add Activity</button>
            </div>
        </div>
    </form> <!-- /form -->
</div> <!-- ./container -->
</body>
</html>
