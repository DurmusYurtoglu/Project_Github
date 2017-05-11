<?php

/**
 * Created by PhpStorm.
 * User: DURMUŞ
 * Date: 6.05.2017
 * Time: 23:44
 */

require_once("User.php");
require_once ("Activity.php");
class UserManagement
{
    public static function getAllActivity()
    {
        require_once("../DataLayer/DB.php");
        $db = new DB();
        $result = $db->getDataTable("select idActivity, name, summary, date,category,place,city,director,writer,sponsor,availableSeats,price from activity order by name");
        $allUsers = array();
        while ($row = $result->fetch_assoc()) {
            $userObj = new Activity($row["idActivity"],$row["name"],$row["summary"],$row["date"],$row["category"],$row["place"],$row["city"],$row["director"],$row["writer"],$row["sponsor"],$row["availableSeats"],$row["price"] );
            array_push($allUsers, $userObj);
        }

        return $allUsers;
    }

    public static function insertNewActivity($actName, $summary, $date, $category,$place,$city,$director,$writer,$sponsor,$seat,$price)
    {
        require_once("../DataLayer/DB.php");
        $db = new DB();
        echo "geldiiii".$actName;
        $success = $db->executeQuery("INSERT INTO activity (idActivity,name, summary, date, category,place,city,director,writer,sponsor,AvailableSeats,price) VALUES (NULL,'$actName',' $summary','$date', '$category','$place','$city','$director','$writer','$sponsor','$seat','$price')");
        return $success;
    }

    public static function insertNewUser($name, $lastName, $email, $password,$birthDate,$gender,$phoneNumber)
    {
        require_once("../DataLayer/DB.php");
        $db = new DB();
        $success = $db->executeQuery("INSERT INTO user(idUser, name,lastName,email,password,gender,rank,phoneNumber,birthDate) VALUES (NULL,'$name','$lastName','$email','$password','$gender',0,'$phoneNumber','$birthDate')");
        return $success;
    }
    public static function deleteUser($userId)
    {
        require_once("../DataLayer/DB.php");
        $db = new DB();
        $success = $db->executeQuery("DELETE FROM user WHERE idUser = '$userId' ");
        return $success;
    }
    public static function makeAdmin($userId)
    {
        require_once("../DataLayer/DB.php");
        $db = new DB();
        $success = $db->executeQuery("UPDATE user SET rank = 1 WHERE idUser = '$userId' ");
        return $success;
    }
    public static function updateUser($userId,$value,$name)
    {
        require_once("../DataLayer/DB.php");
        $db = new DB();
        $success = $db->executeQuery("UPDATE user SET $name = '$value' WHERE idUser = '$userId' ");
        return $success;
    }
    public static function loginUser($userEmail,$userPassword)
    {
        require_once("DataLayer/DB.php");
        $db = new DB();
        $query = "SELECT * FROM user WHERE email = '$userEmail' AND password = '$userPassword'";
        $result = $db->getSearch($query);

        $row = $result->fetch_assoc();
        if($row['name'] == null)
        {
            $message = "Incorrect entry, try again";
        }
        else
        {
            session_start();
            $_SESSION['nameUser'] = $row['name'];
            $_SESSION['idUser'] = $row['idUser'];
            if($row['rank']== 0)
            {
                header("location: PresentationLayer/LoggedIn.php");
            }elseif ($row['rank']==1)
            {
                header("location: PresentationLayer/Admin.php");
            }

        }
    }
    public static function getAllUser () {
        $db = new DB();
        $result = $db->getDataTable("select idUser,name, lastName, email ,gender ,rank , phoneNumber from user order by idUser");

        $allUsers = array();

        while($row = $result->fetch_assoc()) {
            $userObj = new User($row["idUser"],$row["name"], $row["lastName"], $row["email"],$row["password"],$row["gender"],$row["rank"],$row["phoneNumber"],$row["birthday"]);
            array_push($allUsers, $userObj);
        }

        return $allUsers;
    }
}