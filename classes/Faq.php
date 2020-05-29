<?php

class Faq {


    /**
     * @var int The Faq ID from the database
     */
    public $id = null;

    /**
     * @var string Question of FAQ
     */
    public $question = null;

    /**
     * @var string Anser of FAQ
     */
    public $answer = null;

    /**
     * @var string The link of the GAQ
     */
    public $link = null;


    /**
     * Sets the object's properties using the values in the supplied array
     *
     * @param assoc The property values
     */

    public function __construct($data = array()) {

        if (isset($data['id'])) $this->id = (int)$data['id'];
        if (isset($data['question'])) $this->question = $data['question'];
        if (isset($data['answer'])) $this->answer = $data['answer'];
        if (isset($data['link'])) $this->link = $data['link'];

    }

    /**
     * Sets the object's properties using the edit form post values in the supplied array
     *
     * @param assoc The form post values
     */

    public function storeFormValues($params)
    {

        // Store all the parameters
        $this->__construct($params);
    }

    /**
     * Returns an FAQ object matching the given Post ID
     *
     * @param int The FAQ ID
     * @return Faq|false The Jumbotron object, or false if the record was not found or there was a problem
     */

    public function getById($id)
    {
        $connection = connect();
        $sql = "SELECT * FROM Faq WHERE id = :id";
        $st = $connection->prepare($sql);
        $st->bindValue(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $row = $st->fetch();
        $conn = null;
        if ($row) return new Faq($row);
    }


    /**
     * Returns all (or a range of) Faq objects in the DB
     *
     * @param int Optional The number of rows to return (default=all)
     * @return Array|false A two-element array : results => array, a list of Faq objects; totalRows => Total number of Posts
     */


#$numRows = The maximum number of Faq to retrieve
    public function getList($numRows = 1000000)
    {
        $connection = connect();
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Faq ORDER BY question DESC LIMIT :numRows";

        $st = $connection->prepare($sql);
        $st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
        $st->execute();
        $list = array();
        while ($row = $st->fetch()) {
            $faq = new Faq($row);
            $list[] = $faq;
        }
        $connection = null;
        return (array("results" => $list));
    }


    /**
     * Inserts the current Faq object into the database, and sets its ID property.
     */
    public function insert() {

        $connection = connect();

        if (!is_null($this->id)) trigger_error("Faq::insert(): Attempt to insert an Post object that already has its ID property set (to $this->id).", E_USER_ERROR);

        $sql = "INSERT INTO Faq ( question, answer, link  ) VALUES (  :question, :answer :link )";
        $st = $connection->prepare($sql);
        $st->bindValue(":question", $this->question, PDO::PARAM_STR);
        $st->bindValue(":answer", $this->answer, PDO::PARAM_STR);
        $st->bindValue(":link", $this->link, PDO::PARAM_STR);
        $st->execute();
        $this->id = $connection->lastInsertId();
        $connection = null;
    }


    /**
     * Updates the current Faq object in the database.
     */
    public function update()
    {

        if (is_null($this->id)) trigger_error("Faq::update(): Attempt to update an Jumbotron object that does not have its ID property set.", E_USER_ERROR);

        $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "UPDATE Faq SET question=:question, answer=:answer, Link=:Link WHERE id = :id";
        $st = $connection->prepare($sql);
        $st->bindValue(":question", $this->question, PDO::PARAM_STR);
        $st->bindValue(":answer", $this->answer, PDO::PARAM_STR);
        $st->bindValue(":link", $this->link, PDO::PARAM_STR);
        $st->execute();
        $connection = null;
    }


    /**
     * Deletes the current Faq object from the database.
     */

    public function delete()
    {

        if (is_null($this->id)) trigger_error("Faq::delete(): Attempt to delete an Jumbotron object that does not have its ID property set.", E_USER_ERROR);

        $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $st = $connection->prepare("DELETE FROM Faq WHERE id = :id LIMIT 1");
        $st->bindValue(":id", $this->id, PDO::PARAM_INT);
        $st->execute();
        $connection = null;
    }

}

?>
