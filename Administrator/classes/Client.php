<?php
class Client{
    //attributs
    protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $birthdate;
    protected $address;
    protected $tel;
    protected $etat;


    protected $createdAt;

    /**
     * Client constructor.
     * @param $username
     * @param $email
     * @param $password
     * @param $birthdate
     * @param $address
     * @param $tel
     */
    public function __construct($username, $email, $password, $birthdate, $address, $tel)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->birthdate = $birthdate;
        $this->address = $address;
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }


}

?>
