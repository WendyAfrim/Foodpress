<?php 

namespace App\Models;

use App\Core\Database;

class User extends Database {

    protected $id = null;
    protected $firstname;
    protected $lastname;
    protected $email; 
    protected $password = null;
    protected $roles;
    protected $address;
    protected $zipcode;
    protected $city;
    protected $phone;
    protected $payment;
    // protected $createdAt;


    /**
     * Appel du constructeur du parent pour instanciation de l'objet PDO
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Récupération de l'id
     *
     * @return int
     */
    public function getId() {

        return $this->id;
    }

    /**
     * Setting de l'id
     *
     * @return void
     */
    public function setId($id) : int
    {
        $this->id = $id;
    }

    /**
     * Récupération du prénom
     *
     * @return string
     */
    public function getFirstname() :string
    {

        return $this->firstname;
    }

    /**
     * Setting du prénom
     *
     * @param mixed 
     */
    public function setFirstname($firstname) : void
    {

        $this->firstname = $firstname;
    }

    /**
     * Récupération du nom
     *
     * @return string
     */
    public function getLastname() :string
    {

        return $this->lastname;
    }

    /**
     * Setting du nom
     *
     * @param mixed 
     */
    public function setLastname($lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * Récupération de l'email
     *
     * @return string
     */
    public function getEmail() :string
    {
        return $this->email;
    }

    /**
     * Setting de l'email
     *
     * @param mixed 
     */
    public function setEmail($email) : void
    {

        $this->email = $email;
    }

    /**
     * Récupération du mot de passe
     *
     * @return string
     */
    public function getPassword() :string
    {

        return $this->password;
    }

    /**
     * Setting du mot de passe
     *
     * @param mixed 
     */
    public function setPassword($password) :void
    {

        $this->password = $password;
    }

    /**
     * Récupération du role
     *
     * @return string
     */
    public function getRoles() :string
    {
        
        return $this->role;
    }

    /**
     * Setting du role
     *
     * @param mixed 
     */
    public function setRoles($roles) :void 
    {

        $this->roles = $roles;
    }

    /**
     * Récupération de l'adresse
     *
     * @return string
     */
    public function getAddress() :string
    {

        return $this->address;
    }

    /**
     * Setting de l'adresse
     *
     * @param mixed 
     */
    public function setAdress($address) :void
    {

        $this->address = $address;

    }

    /**
     * Récupération du code postal
     *
     * @return string
     */
    public function getZipcode() :string
    {

        return $this->zipcode;
    }

    /**
     * Setting du code postal
     *
     * @param mixed 
     */
    public function setZipcode($zipcode) :void
    {

        $this->zipcode = $zipcode;
    }

    /**
     * Récupération de la ville
     *
     * @return string
     */
    public function getCity() :string
    {

        return $this->city;
    }

    /**
     * Setting de la ville
     *
     * @param mixed 
     */
    public function setCity($city) :void
    {
        $this->city = $city;
    }

    /**
     * Récupération du téléphone
     *
     * @return string
     */
    public function getPhone() :string
    {

        return $this->phone;
    }

    /**
     * Setting du téléphone
     *
     * @param mixed 
     */
    public function setPhone($phone) :void
    {

        $this->phone = $phone;
    }

    /**
     * Récupération du moyen de paiement
     *
     * @return string
     */
    public function getPayment() :string
    {

        return $this->payment;
    }

    /**
     * Setting du moyen de paiement
     *
     * @param mixed 
     */
    public function setPayment($payment) :void
    {

        $this->payment = $payment;
    }

    /**
     * Récupération de la date d'enregistrement
     *
     * @return string
     */
    // public function getCreatedAt() :date
    // {

    //     return $this->$createdAt;
    // }

    /**
     * Setting de la date
     *
     * @param mixed 
     */
    // public function setCreatedAt($createdAt) :void
    // {

    //     $this->createdAt = $createdAt;
    // }

}