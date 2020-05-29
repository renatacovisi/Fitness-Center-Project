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
     * @var string The user e-mail address
     */
    public $email = null;


    /**
     * @var String The user phone
     */
    public $phone = null;


    /**
     * @var string The title of the message
     */
    public $title = null;

    /**
     * @var String The message
     */
    public $message = null;



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
        if (isset($messageData['title'])) $this->title = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $messageData['title']);
        if (isset($messageData['message'])) $this->message = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $messageData['message']);


    }

    /**
         * Sets the object's properties
         *
         * @param assoc The form values
         */

        public function storeFormValues($params) {

            // Store all the parameters
            $this->__construct($params);

        }

        public static function getById($id) {
            $connection = connect();
            $sql = "SELECT * FROM contactUs WHERE id = :id";
            $st = $connection->prepare($sql);
            $st->bindValue(":id", $id, PDO::PARAM_STR);
            if (!$st->execute()) {
                $connection = null;
                return 'failed';
            };
            $row = $st->fetch();
            $connection = null;
            if ($row) return new ContactUs($row);
        }


    public static function getList($numRows = 1000000)
    {
        $connection = connect();
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM contactUs ORDER BY id DESC LIMIT :numRows";
        $st = $connection->prepare($sql);
        $st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
        $list = array();
        while ($row = $st->fetch()) {
            $testimonial = new ContactUs($row);
            $list[] = $testimonial;
        }
        $connection = null;
        return (array("results" => $list));
    }

    public function insert()
    {
        $connection = connect();

        if (!is_null($this->id)) trigger_error("Contact us::insert(): Attempt to insert an Contact us object that already has its ID property set (to $this->id).", E_USER_ERROR);

        $sql = "INSERT INTO contactUs ( name, email, phone, title, message ) VALUES (  :name, :email, :phone, :title, :message )";
        $st = $connection->prepare($sql);
        $st->bindValue(":name", $this->name, PDO::PARAM_STR);
        $st->bindValue(":email", $this->email, PDO::PARAM_STR);
        $st->bindValue(":phone", $this->phone, PDO::PARAM_STR);
        $st->bindValue(":title", $this->title, PDO::PARAM_STR);
        $st->bindValue(":message", $this->message, PDO::PARAM_STR);
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
        $this->id = $connection->lastInsertId();
        $connection = null;
        return 'success';
    }

    /**
     * Deletes the current Contact Us object from the database.
     */

    public function delete()
    {


        if (is_null($this->id)) trigger_error("Contact us::delete(): Attempt to delete a Contact us object that does not have its ID property set.", E_USER_ERROR);

        $connection = connect();
        $st = $connection->prepare("DELETE FROM contactUs WHERE id = :id LIMIT 1");
        $st->bindValue(":id", $this->id, PDO::PARAM_INT);
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
        $connection = null;
    }
}