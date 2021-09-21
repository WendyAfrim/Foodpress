<?php 

namespace App\Models;

use App\Core\Database;

class Cart extends Database {

    protected $id = null;
    protected $reference;
    protected $status;
    protected $amount; 
    protected $payment_method;
    protected $created_at;
    protected $address;
    protected $zipcode;
    protected $city;
    protected $phone;
    protected $user_id;


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
     * Récupération de la ref
     *
     * @return string
     */
    public function getReference() :string
    {

        return $this->reference;
    }

    /**
     * Setting de la ref
     *
     * @param mixed 
     */
    public function setReference($reference) : void
    {

        $this->reference = $reference;
    }

    /**
     * Récupération du statut
     *
     * @return string
     */
    public function getStatus() :string
    {

        return $this->status;
    }

    /**
     * Setting du statut
     *
     * @param mixed 
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * Récupération du prix
     *
     * @return string
     */
    public function getAmount() :string
    {
        return $this->amount;
    }

    /**
     * Setting du prix
     *
     * @param mixed 
     */
    public function setAmount($amount) : void
    {

        $this->amount = $amount;
    }

    
    /**
     * Récupération de la méthode de paiement
     *
     * @return string
     */
    public function getPaymentMethod() :string
    {

        return $this->payment_method;
    }

    /**
     * Setting de la méthode de paiement
     *
     * @param mixed 
     */
    public function setPaymentMethod($payment_method) :void
    {

        $this->payment_method = $payment_method;
    }

    /**
     * Récupération de la date d'enregistrement
     *
     * @return string
     */
    public function getCreatedAt() :date
    {

        return $this->$created_at;
    }

    /**
     * Setting de la date
     *
     * @param mixed 
     */
    public function setDate($created_at) :void
    {

        $this->created_at = $created_at;
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
    public function setAddress($address) :void
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
     * Récupération de l'user_id
     *
     * @return string
     */
    public function getUserId() :string
    {

        return $this->user_id;
    }

    /**
     * Setting de l'user_id
     *
     * @param mixed 
     */
    public function setUserId($user_id) :void
    {

        $this->user_id = $user_id;
    }

}
