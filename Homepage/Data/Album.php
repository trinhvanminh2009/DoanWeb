<?php

/**
 * Created by PhpStorm.
 * User: azaudio
 * Date: 5/22/2017
 * Time: 3:51 AM
 */
class Album
{
    private $AlbumID;
    private $Name;
    private $Date;
    private $Username;

    /**
     * Album constructor.
     * @param $AlbumID
     * @param $Name
     * @param $Date
     * @param $Username
     */
    public function __construct($AlbumID, $Name, $Date, $Username)
    {
        $this->AlbumID = $AlbumID;
        $this->Name = $Name;
        $this->Date = $Date;
        $this->Username = $Username;
    }

    /**
     * @return mixed
     */
    public function getAlbumID()
    {
        return $this->AlbumID;
    }

    /**
     * @param mixed $AlbumID
     */
    public function setAlbumID($AlbumID)
    {
        $this->AlbumID = $AlbumID;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * @param mixed $Date
     */
    public function setDate($Date)
    {
        $this->Date = $Date;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->Username;
    }

    /**
     * @param mixed $Username
     */
    public function setUsername($Username)
    {
        $this->Username = $Username;
    }

}