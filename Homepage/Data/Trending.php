<?php

/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 5/27/2017
 * Time: 9:32 AM
 */
class Trending
{
    private $TredingId;
    private $TagID;
    private $Url;

    /**
     * Trending constructor.
     * @param $TredingId
     * @param $TagID
     * @param $Url
     */
    public function __construct($TredingId, $TagID, $Url)
    {
        $this->TredingId = $TredingId;
        $this->TagID = $TagID;
        $this->Url = $Url;
    }

    /**
     * @return mixed
     */
    public function getTredingId()
    {
        return $this->TredingId;
    }

    /**
     * @param mixed $TredingId
     */
    public function setTredingId($TredingId)
    {
        $this->TredingId = $TredingId;
    }

    /**
     * @return mixed
     */
    public function getTagID()
    {
        return $this->TagID;
    }

    /**
     * @param mixed $TagID
     */
    public function setTagID($TagID)
    {
        $this->TagID = $TagID;
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


}