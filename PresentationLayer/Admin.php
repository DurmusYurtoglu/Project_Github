<?php
session_start();
$nameUser = null;

if(isset($_SESSION['nameUser'])) {
    $nameUser =  $_SESSION['nameUser'];
}

if(isset($_POST["deleteUser"])) {
    $userID = trim($_POST["deleteUser"]);
    $errorMeesage = "";
    require_once("../LogicLayer/UserManagement.php");
    $result = UserManagement::deleteUser($userID);
    if(!$result) {
        $errorMeesage = "Error!";
    }
}
if(isset($_POST["makeAdmin"])) {
    $makeAdmin = trim($_POST["makeAdmin"]);
    $errorMeesage = "";
    require_once("../LogicLayer/UserManagement.php");
    $result = UserManagement::makeAdmin($makeAdmin);
    if(!$result) {
        $errorMeesage = "Error!";
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
    <title>Tiyatro Dünyası-Admin Page</title>
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
    <div class="container-fluid" id="asd" name="asd" >
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

</nav>
<br><br>

<div class="dropdown" style="margin-left: 88.2%">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        Options
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a href="#" onclick="activityList.style.display='inline';userList.style.display='none'">Activity List</a></li>
        <li><a href="#" onclick="activityList.style.display='none';userList.style.display='inline'">User List</a></li>
        <li><a href="AddActivity.php">Add Activity</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="../index.php">Sign Out</a></li>
    </ul>
</div>
<div id="activityList">
    <div id="search" class="well well-lg">
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
<div id="userList" style="display: none">
    <div id="thTable" >
        <form method="POST" action="<?php $_PHP_SELF ?>"><br><br>
            <table id="idTable" class="table table-bordered table-inverse">
                <thead>
                <h2 style="margin-left: 42%">User List</h2>
                <tr>
                    <th><a class="alert-warning"><u>ID</u></a></th>
                    <th><a class="alert-warning"><u>Name</u></a></th>
                    <th><a class="alert-warning"><u>Lastname</u></a></th>
                    <th><a class="alert-warning"><u>E-mail</u></a></th>
                    <th><a class="alert-warning"><u>Gender</u></a></th>
                    <th><a class="alert-warning"><u>Rank</u></a></th>
                    <th><a class="alert-warning"><u>Phone Number</u></a></th>

                </tr>
                <tr>
                    <?php
                    require_once ("../LogicLayer/UserManagement.php");
                    $userList = UserManagement::getAllUser();

                    for($i = 0; $i < count($userList); $i++) {
                    ?>
                <tr>
                    <td ><?php echo $userList[$i]->getIdUser(); ?></td>
                    <td><?php echo $userList[$i]->getName(); ?></td>
                    <td><?php echo $userList[$i]->getLastName(); ?></td>
                    <td><?php echo $userList[$i]->getEmail(); ?></td>
                    <td><?php echo $userList[$i]->getGender(); ?></td>
                    <td><?php echo $userList[$i]->getRank(); ?></td>
                    <td><?php echo $userList[$i]->getPhoneNumber(); ?></td>
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
    <div style="background-color:  #eeeeee ;width: 700px;margin-left: 22%">
        <form class="form-inline" method="post" role="form" style="background-color:  #eeeeee;margin-left: 19%"  action="<?php $_PHP_SELF ?>">
            <div class="form-group" style="width: 700px">
                <div class="input-group">
                    <span class="input-group-btn"><button href="" onclick="activityList.style.display='none';userList.style.display='inline'" type="submit" class="btn btn-warning" name ="btn-sign">Delete</button></span>
                    <input type="number" min="0" class="form-control" name="deleteUser" placeholder="User ID">
                </div>
                <div class="input-group">
                    <input type="number" min="0" class="form-control" name="makeAdmin" placeholder="User ID">
                    <span class="input-group-btn"><button href="#" onclick="activityList.style.display='none';userList.style.display='inline'" type="submit" class="btn btn-warning" name ="btn-sign">Make Admin</button></span>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
