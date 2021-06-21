<?php


class User
{
private $email;
private $password;
private $username;
private $branch;
private $isAdmin;

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setIsAdmin($isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * User constructor.
     * @param $email
     * @param $password
     * @param $username
     * @param $branch
     * @param $isAdmin
     */
    public function __construct($email, $password, $username, $branch, $isAdmin)
    {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->branch = $branch;
        $this->isAdmin = $isAdmin;
    }


    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */

}