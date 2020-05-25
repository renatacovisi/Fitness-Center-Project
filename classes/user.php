<?php

/**
 * Class to handle users
 */
class user {

// Properties

    /**
     * @var int The user ID from the database
     */
    public $id = null;

    /**
     * @var string The user name
     */
    public $name = null;

    /**
     * @var string The user surname
     */
    public $surname = null;

    /**
     * @var string The user PPS number
     */
    public $PPS = null;

    /**
     * @var string The user e-mail address
     */
    public $email = null;


    /**
     * @var string The user password
     */
    public $password = null;

    /**
     * @var int The user date of birth
     */
    public $dateOfBirth = null;

    /**
     * @var String The user phone
     */
    public $phone = null;

    /**
     * @var String The user fee plan
     */
    public $feePlan = null;

    /**
     * @var String The user photo
     */
    public $photo = null;

    /**
     * @var String The user photo
     */
    public $type = null;

    /**
     * Sets the object's properties using the values in the supplied array
     *
     * @param assoc The property values
     */

    public function __construct($userData = array())
    {
        if (isset($userData['id'])) $this->id = (int)$userData['id'];
        if (isset($userData['name'])) $this->name = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $userData['name']);
        if (isset($userData['surname'])) $this->surname = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $userData['surname']);
        if (isset($userData['PPS'])) $this->PPS = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $userData['PPS']);
        if (isset($userData['email']) and (filter_var($userData['email'], FILTER_VALIDATE_EMAIL))) $this->email = $userData['email'];
        if (isset($userData['password'])) $this->password = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $userData['password']);
        if (isset($userData['dateOfBirth'])) $this->dateOfBirth = strtotime($userData['dateOfBirth']);
        if (isset($userData['phone'])) $this->phone = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $userData['phone']);
        if (isset($userData['feePlan'])) $this->feePlan = $userData['feePlan'];
        if (isset($userData['photo'])) $this->photo = $userData['photo'];
        if (isset($userData['type'])) $this->type = $userData['type'];
    }


    /**
     * Sets the object's properties using the edit form post values in the supplied array
     *
     * @param assoc The form post values
     */

    public function storeFormValues($params) {

        // Store all the parameters
        $this->__construct($params);
        $this->type = "member";

    }

    public function insert() {
        $connection = connect();
        // Does the User object already have an ID?
        if (!is_null($this->id)) trigger_error("User::insert(): Attempt to insert an User object that already has its ID property set (to $this->id).", E_USER_ERROR);

        // Insert the User
        $sql = "INSERT INTO user (id, name, surname, PPS, email, password, dateOfBirth, phone, feePlan, photo) VALUES (:id, :name, :surname, :PPS, :email, :password, :dateOfBirth, :phone, :feePlan, :photo)";
        $st = $connection->prepare($sql);
        $st->bindValue(":name", $this->name, PDO::PARAM_STR);
        $st->bindValue(":surname", $this->surname, PDO::PARAM_STR);
        $st->bindValue(":PPS", $this->PPS, PDO::PARAM_STR);
        $st->bindValue(":email", $this->email, PDO::PARAM_STR);
        $st->bindValue(":password", $this->password, PDO::PARAM_STR);
        $st->bindValue(":dateOfBirth", $this->dateOfBirth, PDO::PARAM_INT);
        $st->bindValue(":phone", $this->phone, PDO::PARAM_STR);
        $st->bindValue(":feePlan", $this->feePlan, PDO::PARAM_STR);
        $st->bindValue(":photo", $this->photo, PDO::PARAM_STR);
        $st->bindValue(":type", $this->type, PDO::PARAM_STR);
        $st->execute();
        $this->id = $connection->lastInsertId();
        $connection = null;
    }

    public static function getByEmail($email) {
        $connection = connect();
        $sql = "SELECT * FROM user WHERE email = :email";
        $st = $connection->prepare($sql);
        $st->bindValue(":email", $email, PDO::PARAM_STR);
        $st->execute();
        $row = $st->fetch();
        $connection = null;
        if ($row) return new User($row);
    }

    public static function generatePublicUser() {
        $user = new User();
        $user->id = -1;
        $user->type = 'public';
        return $user;
    }
}