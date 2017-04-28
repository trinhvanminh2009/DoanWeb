<?php
/**
 * Created by PhpStorm.
 * User: azaudio
 * Date: 4/21/2017
 * Time: 5:02 PM
 */
class Comment{
    private $commentId;
    private $username;
    private $imageId;
    private $date;
    private $content;

    /**
     * comment constructor.
     * @param $commentId
     * @param $username
     * @param $imageId
     * @param $date
     * @param $content
     */
    public function __construct($commentId, $username, $imageId, $date, $content)
    {
        $this->commentId = $commentId;
        $this->username = $username;
        $this->imageId = $imageId;
        $this->date = $date;
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * @param mixed $commentId
     */
    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;
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
    public function getImageId()
    {
        return $this->imageId;
    }

    /**
     * @param mixed $imageId
     */
    public function setImageId($imageId)
    {
        $this->imageId = $imageId;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

}
?>