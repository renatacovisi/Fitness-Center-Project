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
    public $approval = null;

    /**
     * @var string The name of the person who did the review
     */
    public $className = null;

    /**
     * @var date The name of the person who did the review
     */
    public $creationDate = null;

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
        if (isset($data['approval'])) $this->approval = $data['approval'];
        if (isset($data['className'])) $this->className = $data['className'];
        if (isset($data['creationDate'])) $this->creationDate = $data['creationDate'];
    }


    /**
     * Sets the object's properties using the edit form post values in the supplied array
     *
     * @param assoc The form post values
     */

    public function storeFormValues($params) {

        $this->__construct($params);

        // Parse and store the publication date
        if ( isset($params['creationDate']) ) {
            $creationDate = explode ( '-', $params['creationDate'] );

            if ( count($creationDate) == 3 ) {
                list ( $y, $m, $d ) = $creationDate;
                $this->creationDate = mktime ( 0, 0, 0, $m, $d, $y );
            }
        }
    }

    /**
     * Returns an Testimonial object matching the given Post ID
     *
     * @param int The Testimonial ID
     * @return Testimonial|false The Testimonial object, or false if the record was not found or there was a problem
     */

    public static function getById($id)
    {
        $connection = connect();
        $sql = "SELECT *, UNIX_TIMESTAMP(creationDate) AS creationDate FROM testimonial WHERE id = :id";
        $st = $connection->prepare($sql);
        $st->bindValue(":id", $id, PDO::PARAM_INT);
        if (!$st->execute()) {
            $st->errorCode();
            $st->errorInfo();
            $st->debugDumpParams();
            $connection = null;
            return 'failed';
        };
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

    public static function getList($numRows = 1000000, $approval="approved")
    {
        $connection = connect();
        $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(creationDate) AS creationDate FROM testimonial WHERE approval = :approval ORDER BY stars DESC LIMIT :numRows";
        $st = $connection->prepare($sql);
        $st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
        $st->bindValue( ":approval", $approval, PDO::PARAM_STR );
        if (!$st->execute()) {
            $st->errorCode();
            $st->errorInfo();
            $st->debugDumpParams();
            $connection = null;
            return 'failed';
        };
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

        $sql = 'INSERT INTO testimonial ( title, text, name, stars, approval, className, creationDate  ) '.
        'VALUES ( :title, :text, :name, :stars, :approval, :className, FROM_UNIXTIME(:creationDate) )';
        $st = $connection->prepare($sql);
        $st->bindValue(":title", $this->title, PDO::PARAM_STR);
        $st->bindValue(":text", $this->text, PDO::PARAM_STR);
        $st->bindValue(":name", $this->name, PDO::PARAM_STR);
        $st->bindValue(":stars", $this->stars, PDO::PARAM_INT);
        $st->bindValue(":approval", $this->approval, PDO::PARAM_STR);
        $st->bindValue(":className", $this->className, PDO::PARAM_STR);
        $st->bindValue(":creationDate", $this->creationDate, PDO::PARAM_STR);
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
     * Updates the current Jumbotron object in the database.
     */
    public function update()
    {

        if (is_null($this->id)) trigger_error("Testimonial::update(): Attempt to update an Testimonial object that does not have its ID property set.", E_USER_ERROR);

        $connection = connect();
        $sql = "UPDATE testimonial SET title=:title, text=:text, name=:name, stars=:stars, approval=:approval,".
            " className=:className, creationDate=FROM_UNIXTIME(:creationDate) WHERE id = :id";
        $st = $connection->prepare($sql);
        $st->bindValue(":id", $this->id, PDO::PARAM_INT);
        $st->bindValue(":title", $this->title, PDO::PARAM_STR);
        $st->bindValue(":text", $this->text, PDO::PARAM_STR);
        $st->bindValue(":name", $this->name, PDO::PARAM_STR);
        $st->bindValue(":stars", $this->stars, PDO::PARAM_INT);
        $st->bindValue(":approval", $this->approval, PDO::PARAM_STR);
        $st->bindValue(":className", $this->className, PDO::PARAM_STR);
        $st->bindValue(":creationDate", $this->creationDate, PDO::PARAM_STR);
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
     * Deletes the current Testimonial object from the database.
     */

    public function delete()
    {


        if (is_null($this->id)) trigger_error("Testimonial::delete(): Attempt to delete a Testimonial object that does not have its ID property set.", E_USER_ERROR);

        $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $st = $connection->prepare("DELETE FROM testimonial WHERE id = :id LIMIT 1");
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

}

?>
