<?php

$errorMeesage = "";

if(isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["email"]) &&isset($_POST["password"]) && $_POST["password"] == $_POST["password2"]&& isset($_POST["birthDate"]) && isset($_POST["gender"]) ) {
    $name = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $eMail = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $password2 = trim($_POST["password2"]);
    $birthDate=trim($_POST["birthDate"]);
    $gender=trim($_POST["gender"]);
    $phoneNumber = trim($_POST["phoneNumber"]);
    $errorMeesage = "";
    require_once("../LogicLayer/UserManagement.php");
    $result = UserManagement::insertNewUser($name,$lastName,$eMail,$password,$birthDate,$gender,$phoneNumber);
    if(!$result) {
        $errorMeesage = "Yeni kullanıcı kaydı başarısız!";
    }
    else
        {
            header("location: ../index.php");
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

    <title>Sign Up</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
    <link href="../css/new.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link href="../css/signin2.css" rel="stylesheet">


</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid" >
        <div class="navbar-header navbar-right">
            <br>
            <a class="h4" style="color: white">Create an Account</a>
        </div><!-- /.container-fluid -->
        <div class=" navbar-left">
            <a class="h1" style=" color: white" href="#" >Tiyatro Dünyası</a><br><br>
        </div>
    </div>
</nav><br><br><br>
<div class="container"  >
    <form class="form-horizontal" method="post" role="form" action="<?php $_PHP_SELF ?>">
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
                <input type="text" id="firstName" name="firstName" placeholder="First Name( Eg.: Emre ,Durmuş)" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Last Name</label>
            <div class="col-sm-9">
                <input type="text" id="lastName" name="lastName" placeholder="Last Name(Eg.: Deniz,Yurtoğlu)" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
                <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
                <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password2" class="col-sm-3 control-label">Password(Again)</label>
            <div class="col-sm-9">
                <input type="password" id="password2" name="password2" placeholder="Password(Again)" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="birthDate" class="col-sm-3 control-label">Date of Birth</label>
            <div class="col-sm-9">
                <input type="date" id="birthDate" name="birthDate" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="phoneNumber" class="col-sm-3 control-label">Phone Number</label>
            <div class="col-sm-9">
                <input type="number" min="0" max="9999999999" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Gender</label>
            <div class="col-sm-6">
                <div class="row" style="margin-left: 0.2%" >
                        <input type="radio" name="gender" value="Female" required><label for="Female">Female</label>
                        <input type="radio" name="gender" value="Male" required><label for="Male">Male</label>
                </div>
            </div>
        </div> <!-- /.form-group -->
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="terms" required>I accept <a href="#">terms</a>
                    </label>
                </div>
            </div>
        </div> <!-- /.form-group -->
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
        </div>
    </form> <!-- /form -->
</div> <!-- ./container -->

</body>
</html>

