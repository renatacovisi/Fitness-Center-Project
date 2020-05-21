<?php

/**
 * Class to handle users
 */
class user {

// Properties

    /**
     * @var int The user ID from the database
     */
    public $userId = null;

    /**
     * @var string The user name
     */
    public $userName = null;

    /**
     * @var string The user surname
     */
    public $userSurname = null;

    /**
     * @var string The user PPS number
     */
    public $userPPS = null;

    /**
     * @var string The user e-mail adress
     */
    public $userEmail = null;


    /**
     * @var string The user password
     */
    public $userPassword = null;

    /**
     * @var int The user date of birth
     */
    public $userDateOfBirth = null;

    /**
     * @var String The user phone
     */
    public $userPhone = null;

    /**
     * @var String The user fee plan
     */
    public $userFeePlan = null;

    /**
     * @var String The user photo
     */
    public $userPhoto = null;

    /**
     * Sets the object's properties using the values in the supplied array
     *
     * @param assoc The property values
     */

    public function __construct($userData = array())
    {
        if (isset($userData['userId'])) $this->userId = (int)$userData['userId'];
        if (isset($userData['userName'])) $this->userName = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $userData['userName']);
        if (isset($userData['userSurname'])) $this->userSurname = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $userData['userSurname']);
        if (isset($userData['userPPS'])) $this->userPPS = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $userData['userPPS']);
        if (isset($userData['userEmail']) and (filter_var(userEmail, FILTER_VALIDATE_EMAIL))) $this->userEmail = $userData['userEmail'];
        if (isset($userData['userPassword'])) $this->userPassword = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $userData['userPassword']);
        if (isset($userData['userDateOfBirth'])) $this->userDateOfBirth = strtotime($userData['userDateOfBirth']);
        if (isset($userData['userPhone'])) $this->userPhone = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $userData['userPhone']);
        if (isset($userData['userFeePlan'])) $this->userFeePlan = $userData['userFeePlan'];
        if (isset($userData['userPhoto'])) $this->userPhoto = $userData['userPhoto'];
    }


    /**
     * Sets the object's properties using the edit form post values in the supplied array
     *
     * @param assoc The form post values
     */

    public function storeFormValues($params) {

        // Store all the parameters
        $this->__construct($params);

    }

    public function insert($connection) {

        // Does the User object already have an ID?
        if (!is_null($this->userId)) trigger_error("User::insert(): Attempt to insert an User object that already has its ID property set (to $this->Userid).", E_USER_ERROR);

        // Insert the User
        $sql = "INSERT INTO user (userId, userName, userSurname, userPPS, userEmail, userPassword, userDateOfBirth, userPhone, userFeePlan, userPhoto) VALUES (:userId, :userName, :userSurname, :userPPS, :userEmail, :userPassword, :userDateOfBirth, :userPhone, :userFeePlan, :userPhoto)";
        $st = $connection->prepare($sql);
        $st->bindValue(":userName", $this->userName, PDO::PARAM_STR);
        $st->bindValue(":userSurname", $this->userSurname, PDO::PARAM_STR);
        $st->bindValue(":userPPS", $this->userPPS, PDO::PARAM_STR);
        $st->bindValue(":userEmail", $this->userEmail, PDO::PARAM_STR);
        $st->bindValue(":userPassword", $this->userPassword, PDO::PARAM_STR);
        $st->bindValue(":userDateOfBirth", $this->userDateOfBirth, PDO::PARAM_INT);
        $st->bindValue(":userPhone", $this->userPhone, PDO::PARAM_STR);
        $st->bindValue(":userFeePlan", $this->userFeePlan, PDO::PARAM_STR);
        $st->bindValue(":userPhoto", $this->userPhoto, PDO::PARAM_STR);
        $st->execute();
        $this->userId = $connection->lastInsertId();
        $connection = null;
    }

    public static function getByEmail($userEmail, $connection) {

        $sql = "SELECT * FROM user WHERE userEmail = :userEmail";
        $st = $connection->prepare($sql);
        $st->bindValue(":userEmail", $userEmail, PDO::PARAM_STR);
        $st->execute();
        $row = $st->fetch();
        $connection = null;
        if ($row) return new User($row);
    }
}