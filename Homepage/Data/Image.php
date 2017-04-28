<?php
/**
 * Created by PhpStorm.
 * User: azaudio
 * Date: 4/21/2017
 * Time: 11:30 AM
 */
class Image{
    private $ImageID;
    private $Name;
    private $Desciption;
    private $Topic;
    private $Date;
    private $Url;
    private $Username;

    /**
     * Image constructor.
     * @param $ImageID
     * @param $Name
     * @param $Desciption
     * @param $Topic
     * @param $Date
     * @param $Url
     * @param $Username
     */
    public function __construct($ImageID, $Name, $Desciption, $Topic, $Date, $Url, $Username)
    {
        $this->ImageID = $ImageID;
        $this->Name = $Name;
        $this->Desciption = $Desciption;
        $this->Topic = $Topic;
        $this->Date = $Date;
        $this->Url = $Url;
        $this->Username = $Username;
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
    public function getDesciption()
    {
        return $this->Desciption;
    }

    /**
     * @param mixed $Desciption
     */
    public function setDesciption($Desciption)
    {
        $this->Desciption = $Desciption;
    }

    /**
     * @return mixed
     */
    public function getTopic()
    {
        return $this->Topic;
    }

    /**
     * @param mixed $Topic
     */
    public function setTopic($Topic)
    {
        $this->Topic = $Topic;
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
    public function getUrl()
    {
        return $this->Url;
    }

    /**
     * @param mixed $Url
     */
    public function setUrl($Url)
    {
        $this->Url = $Url;
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
?>