<?php
/**
 * Created by PhpStorm.
 * User: azaudio
 * Date: 4/20/2017
 * Time: 4:10 PM
 */
class User{
    private $username;
    private $password;
    private $lastname;
    private $fristName;
    private $gender;
    private $avatar;

    /**
     * User constructor.
     * @param $username
     * @param $password
     * @param $lastname
     * @param $fristName
     * @param $gender
     * @param $avatar
     */
    public function __construct($username, $password, $lastname, $fristName, $gender, $avatar)
    {
        $this->username = $username;
        $this->password = $password;
        $this->lastname = $lastname;
        $this->fristName = $fristName;
        $this->gender = $gender;
        $this->avatar = $avatar;
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getFristName()
    {
        return $this->fristName;
    }

    /**
     * @param mixed $fristName
     */
    public function setFristName($fristName)
    {
        $this->fristName = $fristName;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

}
?>