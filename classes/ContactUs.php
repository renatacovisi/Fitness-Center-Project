<?php


class ContactUs {


    /**
     * @var int The ContactUs ID from the database
     */
    public $id = null;

    /**
     * @var string The user name
     */
    public $name = null;

    /**
     * @var String The user phone
     */
    public $phone = null;

    /**
     * @var string The user e-mail address
     */
    public $email = null;

    /**
     * @var String The user photo
     */
    public $message = null;

    /**
     * @var string The link of the Post
     */
    public $link = null;

    /**
     * @var string The text of the button of the Post
     */
    public $buttonText = null;


    /**
     * Sets the object's properties using the values in the supplied array
     *
     * @param assoc The property values
     */

    public function __construct($messageData = array()) {

        if (isset($messageData['id'])) $this->id = (int)$messageData['id'];
        if (isset($messageData['name'])) $this->name = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $messageData['name']);
        if (isset($messageData['phone'])) $this->phone = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $messageData['phone']);
        if (isset($messageData['email']) and (filter_var($messageData['email'], FILTER_VALIDATE_EMAIL))) $this->email = $messageData['email'];
        if (isset($messageData['message'])) $this->message = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $messageData['message']);
        if (isset($messageData['link'])) $this->link = $messageData['link'];
        if (isset($messageData['buttonText'])) $this->buttonText = $messageData['buttonText'];
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

        public static function getByEmail($email) {
            $connection = connect();
            $sql = "SELECT * FROM contactUs WHERE email = :email";
            $st = $connection->prepare($sql);
            $st->bindValue(":email", $email, PDO::PARAM_STR);
            $st->execute();
            $row = $st->fetch();
            $connection = null;
            if ($row) return new ContactUs($row);
        }



    public function insert()
    {
        $connection = connect();

        if (!is_null($this->id)) trigger_error("Contact us::insert(): Attempt to insert an Contact us object that already has its ID property set (to $this->id).", E_USER_ERROR);

        $sql = "INSERT INTO ContactUs ( name, email, phone, message, link, buttonText ) VALUES (  :name, :email :message, :link, :buttonText )";
        $st = $connection->prepare($sql);
        $st->bindValue(":name", $this->name, PDO::PARAM_STR);
        $st->bindValue(":email", $this->phone, PDO::PARAM_STR);
        $st->bindValue(":phone", $this->name, PDO::PARAM_STR);
        $st->bindValue(":message", $this->message, PDO::PARAM_INT);
        $st->bindValue(":link", $this->link, PDO::PARAM_STR);
        $st->bindValue(":buttonText", $this->buttonText, PDO::PARAM_STR);
        if (!$st->execute()) {
            $st->errorCode();
            $st->errorInfo();
            $st->debugDumpParams();
            $connection = null;
            return 'failed';
        };
        $this->id = $connection->lastInsertId();
        $connection = null;
        return 'success';
    }


    /**
     * Updates the current ContacUs object in the database.
     */
    public function update()
    {

        if (is_null($this->id)) trigger_error("Contact us::update(): Attempt to update an Contact us object that does not have its ID property set.", E_USER_ERROR);

        $connection = connect();
        $sql = "UPDATE ContactUs SET  name=:name, email=:email, phone=:phone,".
            " message=:message, link=:link, buttonText=:buttonText  WHERE id = :id";
        $st = $connection->prepare($sql);
        $st->bindValue(":name", $this->name, PDO::PARAM_STR);
        $st->bindValue(":email", $this->phone, PDO::PARAM_STR);
        $st->bindValue(":phone", $this->name, PDO::PARAM_STR);
        $st->bindValue(":message", $this->message, PDO::PARAM_INT);
        $st->bindValue(":link", $this->link, PDO::PARAM_STR);
        $st->bindValue(":buttonText", $this->buttonText, PDO::PARAM_STR);
        if (!$st->execute()) {
            $st->errorCode();
            $st->errorInfo();
            $st->debugDumpParams();
            $connection = null;
            return 'failed';
        };
        return 'success';
        $connection = null;
    }



    /**
     * Deletes the current Contact Us object from the database.
     */

    public function delete()
    {


        if (is_null($this->id)) trigger_error("Contact us::delete(): Attempt to delete a Contact us object that does not have its ID property set.", E_USER_ERROR);

        $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $st = $connection->prepare("DELETE FROM ContactUs WHERE id = :id LIMIT 1");
        $st->bindValue(":id", $this->id, PDO::PARAM_INT);
        if (!$st->execute()) {
            $st->errorCode();
            $st->errorInfo();
            $st->debugDumpParams();
            $connection = null;
            return 'failed';
        };
        $connection = null;
    }
        /*        public static function generatePublicMessage() {
                    $messageData = new ContactUs();
                    return $messageData;
                }*/
    }

}