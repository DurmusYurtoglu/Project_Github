<?php

/**
 * Created by PhpStorm.
 * User: DURMUŞ
 * Date: 10.05.2017
 * Time: 11:13
 */
class Activity
{
    private $idActivity;
    private $name;
    private $summary;
    private $date;
    private $category;
    private $idPlace;
    private $idDirector;
    private $idWriter;
    private $idSponsor;
    private $availableSeats;

    function __construct($idActivity = NULL, $name = NULL,$summary=NULL,$date=NULL,$category=NULL,$idPlace=NULL,$idDirector=NULL,$idWriter=NULL, $idSponsor = NULL,$availableSeats=NULL) {
        $this->idActivity = $idActivity;
        $this->name = $name;
        $this->summary = $summary;
        $this->date=$date;
        $this->category=$category;
        $this->idPlace=$idPlace;
        $this->idDirector=$idDirector;
        $this->idWriter=$idWriter;
        $this->idSponsor = $idSponsor;
        $this->availableSeats = $availableSeats;
    }

    /**
     * @return mixed
     */
    public function getİdActivity()
    {
        return $this->idActivity;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return mixed
     */
    public function getİdDirector()
    {
        return $this->idDirector;
    }

    /**
     * @return mixed
     */
    public function getİdWriter()
    {
        return $this->idWriter;
    }

    /**
     * @return mixed
     */
    public function getİdSponsor()
    {
        return $this->idSponsor;
    }

    /**
     * @return mixed
     */
    public function getAvailableSeats()
    {
        return $this->availableSeats;
    }

    /**
     * @return mixed
     */
    public function getİdPlace()
    {
        return $this->idPlace;
    }

}