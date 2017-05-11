<?php

/**
 * Created by PhpStorm.
 * User: DURMUŞ
 * Date: 6.05.2017
 * Time: 23:44
 */
class User
{
    private $idUser;
    private $name;
    private $lastName;
    private $email;
    private $password;
    private $gender;
    private $rank;
    private $phoneNumber;
    private $birthDate;

    function __construct($idUser = NULL, $name = NULL,$lastName=NULL,$email=NULL,$password=NULL,$gender=NULL,$rank=NULL, $phoneNumber = NULL,$birthDate=NULL) {
        $this->idUser = $idUser;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email=$email;
        $this->password=$password;
        $this->gender=$gender;
        $this->rank=$rank;
        $this->phoneNumber = $phoneNumber;
        $this->birthDate=$birthDate;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function getName() {
        return $this->name;
    }
    public function getLastName() {
        return $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getGender() {
        return $this->gender;
    }
    public function getRank() {
        return $this->rank;
    }
    public function getPhoneNumber() {
        return $this->phoneNumber;
    }
}