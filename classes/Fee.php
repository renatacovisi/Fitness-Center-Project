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

        if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
        if ( isset( $data['name'] ) ) $this->name = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['name']);
        if ( isset( $data['text'] ) ) $this->text = (string) $data['text'];
        if ( isset( $data['price'] ) ) $this->price = (double) $data['price'];
        if ( isset( $data['maxClasses'] ) ) $this->maxClasses = (int) $data['maxClasses'];
    }

    /**
     * Sets the object's properties
     *
     * @param assoc The form fee values
     */

    public function storeFormValues ( $params ) {

        // Store all the parameters
        $this->__construct( $params );

    }


    /**
     * Returns an Fee object matching the given Post ID
     *
     * @param int The Fee ID
     * @return Post|false The Fee object, or false if the record was not found or there was a problem
     */

    public static function getById( $id ) {
        $connection = connect();
        $sql = "SELECT * FROM fee WHERE id = :id";
        $st = $connection->prepare( $sql );
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
     * @return Array|false A two-element array : results => array, a list of Fee objects; totalRows => Total number of Fees
     */

    public static function getList( $numRows=1000000) {
        $connection = connect();
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM fee ORDER BY price ASC LIMIT :numRows";

        $st = $connection->prepare( $sql );
        $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
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

        $sql = "INSERT INTO fee ( name, text, price, maxClasses) VALUES ( :name, :text, :price, :maxClasses )";
        $st = $connection->prepare ( $sql );
        $st->bindValue( ":name", $this->name, PDO::PARAM_STR );
        $st->bindValue( ":text", $this->text,PDO::PARAM_STR );
        $st->bindValue( ":price", $this->price, PDO::PARAM_DOUBLE );
        $st->bindValue( ":maxClasses", $this->maxClasses, PDO::PARAM_INT );
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
        $this->id = $connection->lastInsertId();
        $conn = null;
        return 'success';
    }


    /**
     * Updates the current Fee object in the database.
     */
    public function update() {

        if ( is_null( $this->id ) ) trigger_error ( "Fee::update(): Attempt to update an Fee object that does not have its ID property set.", E_USER_ERROR );

        // Update the Post
        $connection = connect();
        $sql = "UPDATE fee SET name=:name, text=:text, price=:price, maxClasses=:maxClasses WHERE id = :id";
        $st = $connection->prepare ( $sql );
        $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
        $st->bindValue( ":name", $this->name, PDO::PARAM_STR );
        $st->bindValue( ":text", $this->text,PDO::PARAM_STR );
        $st->bindValue( ":price", $this->price, PDO::PARAM_STR );
        $st->bindValue( ":maxClasses", $this->maxClasses, PDO::PARAM_INT );
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
        $connection = null;
        return 'success';
    }


    /**
     * Deletes the current Fee object from the database.
     */

    public function delete() {

        if ( is_null( $this->id ) ) trigger_error ( "Fee::delete(): Attempt to delete an Fee object that does not have its ID property set.", E_USER_ERROR );

        // Delete the Post
        $connection = connect();
        $st = $connection->prepare ( "DELETE FROM fee WHERE id = :id LIMIT 1" );
        $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
        $connection = null;
        return 'success';
    }

}