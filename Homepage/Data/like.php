<?php

/**
 * Created by PhpStorm.
 * User: azaudio
 * Date: 5/4/2017
 * Time: 10:43 AM
 */
class like
{
    private $username;
    private $ImageID;
    private $DateLiked;

    /**
     * like constructor.
     * @param $username
     * @param $ImageID
     * @param $DateLiked
     */
    public function __construct($username, $ImageID, $DateLiked)
    {
        $this->username = $username;
        $this->ImageID = $ImageID;
        $this->DateLiked = $DateLiked;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getImageID()
    {
        return $this->ImageID;
    }

    /**
     * @param mixed $ImageID
     */
    public function setImageID($ImageID)
    {
        $this->ImageID = $ImageID;
    }

    /**
     * @return mixed
     */
    public function getDateLiked()
    {
        return $this->DateLiked;
    }

    /**
     * @param mixed $DateLiked
     */
    public function setDateLiked($DateLiked)
    {
        $this->DateLiked = $DateLiked;
    }

}