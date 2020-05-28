<?php

class Testimonial {

    /**
     * @var int The Testimonial ID from the database
     */
    public $id = null;

    /**
     * @var string Full title of the Testimonial
     */
    public $title = null;

    /**
     * @var string The review of the Testimonial
     */
    public $text = null;

    /**
     * @var string The name of the person who did the review
     */
    public $name = null;

    /**
     * @var integer The stars to grade the Fitness Centre
     */
    public $stars = null;

    /**
     * @var string The link for a photo in the images folder
     */
    public $photoLink = null;

    /**
     * Sets the object's properties using the values in the supplied array
     *
     * @param assoc The property values
     */

    public function __construct($data = array())
    {

        if (isset($data['id'])) $this->id = (int)$data['id'];
        if (isset($data['title'])) $this->title = $data['title'];
        if (isset($data['text'])) $this->text = $data['text'];
        if (isset($data['name'])) $this->name = $data['name'];
        if (isset($data['stars'])) $this->stars = $data['stars'];
        if (isset($data['photoLink'])) $this->photoLink = $data['photoLink'];
    }


    /**
     * Sets the object's properties using the edit form post values in the supplied array
     *
     * @param assoc The form post values
     */

    public function storeFormValues($params) {

        $this->__construct($params);
    }

    /**
     * Returns an Testimonial object matching the given Post ID
     *
     * @param int The Testimonial ID
     * @return Testimonial|false The Testimonial object, or false if the record was not found or there was a problem
     */

    public function getById($id)
    {
        $connection = connect();
        $sql = "SELECT * FROM Testimonial WHERE id = :id";
        $st = $connection->prepare($sql);
        $st->bindValue(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $row = $st->fetch();
        $conn = null;
        if ($row) return new Testimonial($row);
    }

    /**
     * Returns all (or a range of) Testimonials objects in the DB
     *
     * @param int Optional The number of rows to return (default=all)
     * @return Array|false A two-element array : results => array, a list of Testimonial objects; totalRows => Total number of Testimonials
     */

    public function getList($numRows = 1000000)
    {
        $connection = connect();
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Testimonial ORDER BY stars DESC LIMIT :numRows";
        $st = $connection->prepare($sql);
        $st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
        $st->execute();
        $list = array();
        while ($row = $st->fetch()) {
            $testimonial = new Testimonial($row);
            $list[] = $testimonial;
        }
        $connection = null;
        return (array("results" => $list));
    }


    /**
     * Inserts the current Jumbotron object into the database, and sets its ID property.
     */
    public function insert()
    {
        $connection = connect();

        if (!is_null($this->id)) trigger_error("Testimonial::insert(): Attempt to insert an Post object that already has its ID property set (to $this->id).", E_USER_ERROR);

        $sql = "INSERT INTO Testimonial ( title, text, name, stars, photoLink  ) VALUES (  :title, :text :name, :stars, :photoLink )";
        $st = $connection->prepare($sql);
        $st->bindValue(":title", $this->title, PDO::PARAM_STR);
        $st->bindValue(":text", $this->text, PDO::PARAM_STR);
        $st->bindValue(":name", $this->name, PDO::PARAM_STR);
        $st->bindValue(":stars", $this->stars, PDO::PARAM_INT);
        $st->bindValue(":photoLink", $this->photoLink, PDO::PARAM_STR);
        $st->execute();
        $this->id = $connection->lastInsertId();
        $connection = null;
    }


    /**
     * Updates the current Jumbotron object in the database.
     */
    public function update()
    {

        if (is_null($this->id)) trigger_error("Post::update(): Attempt to update an Jumbotron object that does not have its ID property set.", E_USER_ERROR);

        $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "UPDATE Testimonial SET title=:title, text=:text, name=:name, stars=:stars, photoLink=:photoLink WHERE id = :id";
        $st = $connection->prepare($sql);
        $st->bindValue(":title", $this->title, PDO::PARAM_STR);
        $st->bindValue(":text", $this->text, PDO::PARAM_STR);
        $st->bindValue(":name", $this->name, PDO::PARAM_STR);
        $st->bindValue(":stars", $this->stars, PDO::PARAM_INT);
        $st->bindValue(":photoLink", $this->photoLink, PDO::PARAM_STR);
        $st->execute();
        $connection = null;
    }


    /**
     * Deletes the current Testimonial object from the database.
     */

    public function delete()
    {


        if (is_null($this->id)) trigger_error("Testimonial::delete(): Attempt to delete a Testimonial object that does not have its ID property set.", E_USER_ERROR);

        $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $st = $connection->prepare("DELETE FROM Testimonial WHERE id = :id LIMIT 1");
        $st->bindValue(":id", $this->id, PDO::PARAM_INT);
        $st->execute();
        $connection = null;
    }

}

?>
