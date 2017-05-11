<?php
session_start();
$nameUser = null;
$idUser=null;
if(isset($_SESSION['nameUser']) &&isset($_SESSION['idUser'])) {
    $nameUser =  $_SESSION['nameUser'];
    $idUser =  $_SESSION['idUser'];
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <link href="../css/new.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid" style="background-color: white">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-link navbar-right" >
            <a class="label label-info" onclick="updateInfo.style.display='inline'; table.style.display='none'" style="color: #0f0f0f" href="#">Update Information</a>
            <a class="label label-info"  style="color: #0f0f0f" href="#">Contact Us</a>
            <a class="label label-info" style="color: #0f0f0f" href="#">Help</a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="navbar-header navbar-right">
            <br>
            <a class="h4" style="color: white">
                <?php
                if(isset($nameUser)) {
                    echo "Welcome " . $nameUser;
                }
                else {
                    echo "Giriş yapınız!";
                }
                ?>

            </a>
            <a href="../index.php" class="btn btn-warning" >Sign Out</a>
        </div><!-- /.container-fluid -->
        <div class=" navbar-left">
            <a class="h1" style=" color: white" href="#" >Tiyatro Dünyası</a><br><br>
        </div>
    </div>

</nav>
<br/>
<br/>
<div class="col-lg-2" style="margin-left:84%">
    <div class="input-group " >
        <input type="text" class="form-control" placeholder="Search">
        <span class="input-group-btn">
            <button class="btn btn-secondary" type="button">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
          </span>
    </div>
</div>
<br/>
<br/>
<div id="table">
    <div id="search" class="well well-lg" >
        <form class="navbar-form" method="post" action="<?php $_PHP_SELF ?>">
            <div class="input-group">
                <label for="inputDate"></label><input type="date" id="inputDate" name="inputDate" class="form-control">
                <div class="input-group-addon" >Date</div>
            </div>
            <div class="input-group">
                <div class="col-sm-9">
                    <select id="city" name="city" class="form-control">
                        <option value="0">All Cities</option>
                        <option value="Ankara">Ankara</option>
                        <option value="Sivas">Sivas</option>
                        <option value="İzmir">İzmir</option>
                        <option value="İstanbul">İstanbul</option>
                        <option value="Yozgat">Yozgat</option>
                        <option value="Bayburt">Bayburt</option>
                        <option value="Kütahya">Kütahya</option>
                        <option value="Karabük">Karabük</option>
                    </select>
                </div>
            </div>
            <div class="input-group">
                <div class="dropdown">
                    <div class="col-sm-9">
                        <select id="category" name="category" class="form-control">
                            <option value="0">All Categories</option>
                            <option value="Drama">Drama</option>
                            <option value="Musical">Musical</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Tragedy">Tragedy</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ">List Theatres</button>
            <?php
            if(isset($_POST["city"]) && isset($_POST["category"])) {
                $city = trim($_POST["city"]);
                $category = trim($_POST["category"]);
                $date = trim($_POST["inputDate"]);
                echo "Şehir : " . $city."Category : ".$category.$date;
            }
            ?>
        </form>
    </div>
    <div id="thTable">
        <form method="POST" action="<?php $_PHP_SELF ?>">
            <table id="idTable" class="table table-bordered table-inverse">
                <thead>
                <tr>
                    <th>Photo</th>
                    <th><a class="alert-warning"><u>Activity</u></a></th>
                    <th><a class="alert-warning"><u>Director</u></a></th>
                    <th><a class="alert-warning"><u>Place/City</u></a></th>
                    <th><a class="alert-warning"><u>Date</u></a></th>
                    <th></th>
                </tr>
                <tr>
                    <?php
                    require_once ("../LogicLayer/UserManagement.php");
                    $activityList = UserManagement::getAllActivity();

                    for($i = 0; $i < count($activityList); $i++) {
                    ?>
                <tr>
                    <td></td>
                    <td><?php echo $activityList[$i]->getName(); ?></td>
                    <td><?php echo $activityList[$i]->getİdDirector(); ?></td>
                    <td><?php echo $activityList[$i]->getİdPlace(); ?></td>
                    <td><?php echo $activityList[$i]->getDate(); ?></td>
                    <td><a class="link" href="#">more information</a></td>
                </tr>
                <?php
                }
                ?>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </form>
    </div>
</div>

<div id="updateInfo" style="display: none">
    <div class="container" >
        <form class="form-horizontal" method="post" role="form" action="<?php $_PHP_SELF ?>">
            <h2>Update Informations</h2>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" id="firstName" name="firstName" placeholder="First Name( Eg.: Emre ,Durmuş)" class="form-control" S>
                </div>
            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-9">
                    <input type="text" id="lastName" name="lastName" placeholder="Last Name(Eg.: Deniz,Yurtoğlu)" class="form-control" >
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" id="email" name="email" placeholder="Email" class="form-control" >
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control" >
                </div>
            </div>
            <div class="form-group">
                <label for="password2" class="col-sm-3 control-label">Password(Again)</label>
                <div class="col-sm-9">
                    <input type="password" id="password2" name="password2" placeholder="Password(Again)" class="form-control" >
                </div>
            </div>
            <div class="form-group">
                <label for="phoneNumber" class="col-sm-3 control-label">Phone Number</label>
                <div class="col-sm-9">
                    <input type="number" min="0" max="9999999999" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" class="form-control" >
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </div>
        </form> <!-- /form -->
    </div> <!-- ./container -->
</div>

<?php
if(!empty($_POST["firstName"])) {
    $firstName= trim($_POST["firstName"]);
    $errorMeesage = "";
    $tag="name";
    $_SESSION['nameUser']=$firstName;
    require_once("../LogicLayer/UserManagement.php");
    $result = UserManagement::updateUser($idUser,$firstName,$tag);

    if(!$result) {
        $errorMeesage = "Error!";
    }
}
if(!empty($_POST["lastName"])) {
    $lastName= trim($_POST["lastName"]);
    $errorMeesage = "";
    $tag="lastName";
    require_once("../LogicLayer/UserManagement.php");
    $result = UserManagement::updateUser($idUser,$lastName,$tag);

    if(!$result) {
        $errorMeesage = "Error!";
    }
}
if(!empty($_POST["email"])) {
    $email= trim($_POST["email"]);
    $errorMeesage = "";
    $tag="email";
    require_once("../LogicLayer/UserManagement.php");
    $result = UserManagement::updateUser($idUser,$email,$tag);

    if(!$result) {
        $errorMeesage = "Error!";
    }
}
if(!empty($_POST["password"]) && $_POST["password"] == $_POST["password2"]) {
    $password= trim($_POST["password"]);
    $errorMeesage = "";
    $tag="password";
    require_once("../LogicLayer/UserManagement.php");
    $result = UserManagement::updateUser($idUser,$password,$tag);

    if(!$result) {
        $errorMeesage = "Error!";
    }
}if(!empty($_POST["phoneNumber"])) {
    $phoneNumber= trim($_POST["phoneNumber"]);
    $errorMeesage = "";
    $tag="phoneNumber";
    require_once("../LogicLayer/UserManagement.php");
    $result = UserManagement::updateUser($idUser,$phoneNumber,$tag);

    if(!$result) {
        $errorMeesage = "Error!";
    }
}

?>
</body>
</html>
