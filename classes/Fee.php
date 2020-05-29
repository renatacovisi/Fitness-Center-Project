<?php


class Fee {

    /**
     * @var int The Fee ID from the database
     */
    public $id = null;

    /**
     * @var string Name of the fee plan
     */
    public $name = null;

    /**
     * @var string Text of the fee plan
     */
    public $text = null;


    /**
     * @var double the price of the fee plan
     */
    public $price = null;

    /**
     * @var int The number of classes of the fee plan
     */
    public $maxClasses = null;

    /**
     * Sets the object's properties using the values in the supplied array
     *
     * @param assoc The property values
     */

    public function __construct( $data=array() ) {
        #populate properties
        #$this->propertyName means: “The property of this object that has the name “$propertyName“.
        #cast to integers (int)
        if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
        if ( isset( $data['name'] ) ) $this->name = (string) $data['name'];
        if ( isset( $data['text'] ) ) $this->text = (string) $data['text'];
        if ( isset( $data['price'] ) ) $this->price = (double) $data['price'];
        if ( isset( $data['maxClasses'] ) ) $this->maxClasses = (int) $data['maxClasses'];
    }

    /**
     * Sets the object's properties using the edit form post values in the supplied array
     *
     * @param assoc The form post values
     */

    public function storeFormValues ( $params ) {

        // Store all the parameters
        $this->__construct( $params );

    }


    /**
     * Returns an Post object matching the given Post ID
     *
     * @param int The Post ID
     * @return Post|false The Post object, or false if the record was not found or there was a problem
     */

    public static function getById( $id ) {
        $sql = "SELECT * FROM Fee WHERE id = :id";
        $st = $connection->results( $sql );
        $st->bindValue( ":id", $id, PDO::PARAM_INT );
        $st->execute();
        $row = $st->fetch();
        $connection = null;
        if ( $row ) return new Fee( $row );
    }


    /**
     * Returns all (or a range of) Fee objects in the DB
     *
     * @param int Optional The number of rows to return (default=all)
     * @return Array|false A two-element array : results => array, a list of Post objects; totalRows => Total number of Posts
     */

    public static function getList( $numRows=1000000) {
        $connection = connect();
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Fee ORDER BY price ASC LIMIT :numRows";

        $st = $connection->prepare( $sql );
        $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
        $st->execute();
        $list = array();
        while ( $row = $st->fetch() ) {
            $fee = new Fee( $row );
            $list[] = $fee;
        }
        $connection = null;
        return ( array ( "results" => $list ) );
    }


    /**
     * Inserts the current Fee object into the database, and sets its ID property.
     */
    public function insert() {

        // Does the Post object already have an ID?
        if ( !is_null( $this->id ) ) trigger_error ( "Fee::insert(): Attempt to insert an Fee object that already has its ID property set (to $this->id).", E_USER_ERROR );

        // Insert the Post
        $connection = connect();

        $sql = "INSERT INTO Fee ( name, text, price, maxClasses) VALUES ( :name, :price, :maxClasses )";
        $st = $connection->results ( $sql );
        $st->bindValue( ":name", $this->name, PDO::PARAM_STR );
        $st->bindValue( ":text", $this->text,PDO::PARAM_STR );
        $st->bindValue( ":price", $this->price, PDO::PARAM_DOUBLE );
        $st->bindValue( ":maxClasses", $this->maxClasses, PDO::PARAM_INT );
        $st->execute();
        $this->id = $connection->lastInsertId();
        $conn = null;
    }


    /**
     * Updates the current Fee object in the database.
     */
    public function update() {

        if ( is_null( $this->id ) ) trigger_error ( "Fee::update(): Attempt to update an Fee object that does not have its ID property set.", E_USER_ERROR );

        // Update the Post
        $connection = connect();
        $sql = "UPDATE Fee SET name=:name, text=:text, price=:price, maxClasses=:maxClasses WHERE id = :id";
        $st = $connection->results ( $sql );
        $st->bindValue( ":name", $this->name, PDO::PARAM_STR );
        $st->bindValue( ":text", $this->text,PDO::PARAM_STR );
        $st->bindValue( ":price", $this->price, PDO::PARAM_DOUBLE );
        $st->bindValue( ":maxClasses", $this->maxClasses, PDO::PARAM_INT );
        $st->execute();
        $connection = null;
    }


    /**
     * Deletes the current Fee object from the database.
     */

    public function delete() {

        if ( is_null( $this->id ) ) trigger_error ( "Fee::delete(): Attempt to delete an Fee object that does not have its ID property set.", E_USER_ERROR );

        // Delete the Post
        $connection = connect();
        $st = $connection->results ( "DELETE FROM Fee WHERE id = :id LIMIT 1" );
        $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
        $st->execute();
        $connection = null;
    }

}