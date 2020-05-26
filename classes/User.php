<?php

/**
 * Class to handle users
 */
class User extends PDOException {

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
     * @var string The user security message
     */
    public $securityMessage = null;

    /**
     * @var int The user date of birth
     */
    public $dateOfBirth = null;

    /**
     * @var String The user phone
     */
    public $phone = null;


    /**
     * @var String The user card
     */
    public $card = null;


    /**
     * @var String The user name on card
     */
    public $nameOnCard = null;

    /**
     * @var String The user name on card
     */
    public $securityCode = null;


    /**
     * @var date The user name on card
     */
    public $expirationDate = null;

    /**
     * @var String The user fee plan
     */
    public $plan = null;

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
        if (isset($userData['securityMessage'])) $this->securityMessage = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $userData['securityMessage']);
        if (isset($userData['dateOfBirth'])) $this->dateOfBirth = strtotime($userData['dateOfBirth']);
        if (isset($userData['phone'])) $this->phone = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $userData['phone']);
        if (isset($userData['card'])) $this->card = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $userData['card']);
        if (isset($userData['nameOnCard'])) $this->nameOnCard = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $userData['nameOnCard']);
        if (isset($userData['securityCode'])) $this->securityCode = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $userData['securityCode']);
        if (isset($userData['expirationDate'])) $this->dateOfBirth = strtotime($userData['expirationDate']);
        if (isset($userData['plan'])) $this->plan = $userData['plan'];
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

        if ( isset($params['dateOfBirth']) ) {
            $dateOfBirth = explode ( '-', $params['dateOfBirth'] );

            if ( count(dateOfBirth) == 3 ) {
                list ( $y, $m, $d ) = $dateOfBirth;
                $this->dateOfBirth = mktime ( 0, 0, 0, $m, $d, $y );
            }
        }

        if ( isset($params['expirationDate']) ) {
            $expirationDate = explode ( '-', $params['expirationDate'] );

            if ( count($expirationDate) == 3 ) {
                list ( $y, $m, $d ) = $expirationDate;
                $this->expirationDate = mktime ( 0, 0, 0, $m, $d, $y );
            }
        }

    }

    public function insert() {
        $connection = connect();
        // Does the User object already have an ID?
        if (!is_null($this->id)) trigger_error("User::insert(): Attempt to insert an User object that already has its ID property set (to $this->id).", E_USER_ERROR);

        // Insert the User
        $sql = "INSERT INTO user (name, surname, PPS, email, password, securityMessage, dateOfBirth, phone, card, nameOnCard, securityCode, expirationDate, plan, type) VALUES (:name, :surname, :PPS, :email, :password, :securityMessage, FROM_UNIXTIME(:dateOfBirth), :phone, :card, :nameOnCard, :securityCode, FROM_UNIXTIME(:expirationDate), :plan, :type)";
        $st = $connection->prepare($sql);
        $st->bindValue(":name", $this->name, PDO::PARAM_STR);
        $st->bindValue(":surname", $this->surname, PDO::PARAM_STR);
        $st->bindValue(":PPS", $this->PPS, PDO::PARAM_STR);
        $st->bindValue(":email", $this->email, PDO::PARAM_STR);
        $st->bindValue(":password", $this->password, PDO::PARAM_STR);
        $st->bindValue(":securityMessage", $this->securityMessage, PDO::PARAM_STR);
        $st->bindValue(":dateOfBirth", $this->dateOfBirth, PDO::PARAM_INT);
        $st->bindValue(":phone", $this->phone, PDO::PARAM_STR);
        $st->bindValue(":card", $this->card, PDO::PARAM_STR);
        $st->bindValue(":nameOnCard", $this->nameOnCard, PDO::PARAM_STR);
        $st->bindValue(":securityCode", $this->securityCode, PDO::PARAM_STR);
        $st->bindValue(":expirationDate", $this->expirationDate, PDO::PARAM_INT);
        $st->bindValue(":plan", $this->plan, PDO::PARAM_STR);
        $st->bindValue(":type", $this->type, PDO::PARAM_STR);
        if (!$st->execute()) {
            $st->errorCode();
            $st->errorInfo();
            $st->debugDumpParams();
        };


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