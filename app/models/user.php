<?php

class User
{
    private $id;
    private $nameSurname;
    private $user;
    private $password;
    private $email;
    private $address;

    public function __construct(){
        $this->db=Database::connect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNameSurname()
    {
        return $this->nameSurname;
    }

    /**
     * @param mixed $nameSurname
     */
    public function setNameSurname($nameSurname): void
    {
        $this->nameSurname = $nameSurname;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
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
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    public function login(){
        $result= false;
        $user = $this->user;
        $pass = $this->password;
        $result=$this->db->query("select Usuario FROM EcommerceDB.clientes 
             WHERE Usuario='$user' AND Password='$pass';");
        if (!$result){
            die('Error: '. mysqli_error($this->db));
        }
        return $result;
    }

    public function register(){
        $result = false;
        $user= $this->user;
        $pass = $this->password;
        $nameSurname = $this->nameSurname;
        $email = $this->email;
        $address = $this->address;
        $result=$this->db->query("insert into ecommercedb.clientes 
    (NombreApellidos, Usuario, Password, Email, DireccionEnvio)
VALUES ($nameSurname,$user,$pass,$email,$address);");
        if (!$result){
            die('Error: '. mysqli_error($this->db));
        }
        return $result;
    }
}

