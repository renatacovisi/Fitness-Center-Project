<?php

//named Class_ because php does not allow a class and a script with the same name
class Class_
{
    // Properties
    /**
     * @var int The Class_ ID from the database
     */
    public $id = null;

    /**
     * @var string name of the Class_
     */
    public $name = null;

    /**
     * @var string Short description of the Class
     */
    public $shortDescription = null;

    /**
     * @var string Long description of the Class
     */
    public $longDescription = null;

    /**
     * @var string The timetable of the Class_
     */
    public $timetable = null;

    /**
     * @var string The image link of the Class_
     */
    public $image = null;

    /**
     * @var string The fee plan of the Class_
     */
    public $plan = null;

    /**
     * @var string The fee plan of the Class_
     */
    public $externalLink = null;


    /**
     * Sets the object's properties using the values in the supplied array
     *
     * @param assoc The property values
     */

    public function __construct($data = array())
    {


        if (isset($data['id'])) $this->id = (int)$data['id'];
        if (isset($data['name'])) $this->name = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['name']);
        if (isset($data['shortDescription'])) $this->shortDescription = $data['shortDescription'];
        if (isset($data['longDescription'])) $this->longDescription = $data['longDescription'];
        if (isset($data['timetable'])) $this->timetable = $data['timetable'];
        if (isset($data['image'])) $this->image = $data['image'];
        if (isset($data['plan'])) $this->plan = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['plan']);
        if (isset($data['externalLink'])) $this->externalLink = $data['externalLink'];
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
     * Returns an Post object matching the given Post ID
     *
     * @param int The Post ID
     * @return Post|false The Post object, or false if the record was not found or there was a problem
     */
    public static function getById($id)
    {
//        uses the connection function from the connection file
        $connection = connect();
        $sql = "SELECT * FROM class WHERE id = :id";
        $st = $connection->prepare($sql);
        $st->bindValue(":id", $id, PDO::PARAM_INT);
//        verify if the execution in the database is ok, and if not close the connection and return failed
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
        $row = $st->fetch();
        $connection = null;
        if ($row) return new Class_($row);
    }

    /**
     * Returns all (or a range of) Post objects in the DB
     *
     * @param int Optional The number of rows to return (default=all)
     * @return Array|false A two-element array : results => array, a list of Post objects; totalRows => Total number of Posts
     */

    public static function getList($numRows = 1000000, $plan = 'Tree')
    {
        $connection = connect();
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM class
            WHERE plan = :plan ORDER BY id DESC LIMIT :numRows";

        $st = $connection->prepare($sql);
        $st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
        $st->bindValue(":plan", $plan, PDO::PARAM_STR);
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
        $list = array();
        while ($row = $st->fetch()) {
            $Class = new Class_($row);
            $list[] = $Class;
        }
        $connection = null;
        return (array("results" => $list));
    }

    /**
     * Inserts the current Post object into the database, and sets its ID property.
     */
    public function insert()
    {

        if (!is_null($this->id)) trigger_error("Class::insert(): Attempt to insert an Class object that already has its ID property set (to $this->id).", E_USER_ERROR);

        $connection = connect();

        $sql = "INSERT INTO class ( name, shortDescription, longDescription, timetable, image, plan, externalLink ) VALUES (:name, :shortDescription, :longDescription, :timetable, :image, :plan, :externalLink)";
        $st = $connection->prepare($sql);
        $st->bindValue(":name", $this->name, PDO::PARAM_STR);
        $st->bindValue(":shortDescription", $this->shortDescription, PDO::PARAM_STR);
        $st->bindValue(":longDescription", $this->longDescription, PDO::PARAM_STR);
        $st->bindValue(":timetable", $this->timetable, PDO::PARAM_STR);
        $st->bindValue(":plan", $this->plan, PDO::PARAM_STR);
        $st->bindValue(":externalLink", $this->externalLink, PDO::PARAM_STR);
        $st->bindValue(":image", $this->image, PDO::PARAM_STR);
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
        $this->id = $connection->lastInsertId();
        $connection = null;
        return 'success';
    }

    /**
     * Updates the current Post object in the database.
     */
    public function update()
    {

        if (is_null($this->id)) trigger_error("Post::update(): Attempt to update an Post object that does not have its ID property set.", E_USER_ERROR);

        // Update the Post
        $connection = connect();
        $sql = "UPDATE class SET name=:name, shortDescription=:shortDescription, longDescription=:longDescription, timetable=:timetable, image=:image, plan=:plan, externalLink=:externalLink   WHERE id = :id";
        $st = $connection->prepare($sql);
        $st->bindValue(":id", $this->id, PDO::PARAM_INT);
        $st->bindValue(":name", $this->name, PDO::PARAM_STR);
        $st->bindValue(":shortDescription", $this->shortDescription, PDO::PARAM_STR);
        $st->bindValue(":longDescription", $this->longDescription, PDO::PARAM_STR);
        $st->bindValue(":timetable", $this->timetable, PDO::PARAM_STR);
        $st->bindValue(":plan", $this->plan, PDO::PARAM_STR);
        $st->bindValue(":externalLink", $this->externalLink, PDO::PARAM_STR);
        $st->bindValue(":image", $this->image, PDO::PARAM_STR);

        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };

        $connection = null;
    }

    public function delete() {
        if ( is_null( $this->id ) ) trigger_error ( "Class::delete(): Attempt to delete an Post object that does not have its ID property set.", E_USER_ERROR );

        // Delete the Class
        $connection = connect();
        $st = $connection->prepare ( "DELETE FROM class WHERE id = :id LIMIT 1" );
        $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
        $connection = null;
    }

}