<?php


/**
 * Class to handle Posts
 */

class Post
{

    // Properties
    /**
     * @var int The Post ID from the database
     */
    public $id = null;

    /**
     * @var int When the Post was published
     */
    public $publicationDate = null;

    /**
     * @var string Full title of the Post
     */
    public $title = null;

    /**
     * @var string A short summary of the Post
     */
    public $text = null;

    /**
     * @var string The link of the Post
     */
    public $link = null;

    /**
     * @var string The type of the Post - news or offers
     */
    public $type = null;

    /**
     * @var string The text of the button of the Post
     */
    public $buttonText = null;

    /**
     * @var string The link for a photo in the images folder
     */
    public $photoLink = null;


    /**
     * Sets the object's properties using the values in the supplied array
     *
     * @param assoc The property values
     */

    public function __construct( $data=array() ) {


        if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
        if ( isset( $data['publicationDate'] ) ) $this->publicationDate = (int) $data['publicationDate'];
        if ( isset( $data['title'] ) ) $this->title = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['title']);
        if ( isset( $data['text'] ) ) $this->text = $data['text'];
        if ( isset( $data['link'] ) ) $this->link = $data['link'];
        if ( isset( $data['type'] ) ) $this->type = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['type']);
        if ( isset( $data['buttonText'] ) ) $this->buttonText = $data['buttonText'];
        if ( isset( $data['photoLink'] ) ) $this->photoLink = $data['photoLink'];
    }


    /**
     * Sets the object's properties using the edit form post values in the supplied array
     *
     * @param assoc The form post values
     */
    public function storeFormValues ( $params ) {

        // Store all the parameters
        $this->__construct( $params );

        // Parse and store the publication date
        if ( isset($params['publicationDate']) ) {
            $publicationDate = explode ( '-', $params['publicationDate'] );

            if ( count($publicationDate) == 3 ) {
                list ( $y, $m, $d ) = $publicationDate;
                $this->publicationDate = mktime ( 0, 0, 0, $m, $d, $y );
            }
        }
    }


    /**
     * Returns an Post object matching the given Post ID
     *
     * @param int The Post ID
     * @return Post|false The Post object, or false if the record was not found or there was a problem
     */
    public static function getById( $id ) {
//        uses the connection function from the connection file
        $connection = connect();
        $sql = "SELECT *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM post WHERE id = :id";
        $st = $connection->prepare( $sql );
        $st->bindValue( ":id", $id, PDO::PARAM_INT );
//        verify if the execution in the database is ok, and if not close the connection and return failed
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
        $row = $st->fetch();
        $connection = null;
        if ( $row ) return new Post( $row );
    }


    /**
     * Returns all (or a range of) Post objects in the DB
     *
     * @param int Optional The number of rows to return (default=all)
     * @return Array|false A two-element array : results => array, a list of Post objects; totalRows => Total number of Posts
     */

    public static function getList( $numRows=1000000, $type="news" ) {
        $connection = connect();
        $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM post
            WHERE type = :type ORDER BY publicationDate DESC LIMIT :numRows";

        $st = $connection->prepare( $sql );
        $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
        $st->bindValue( ":type", $type, PDO::PARAM_STR );
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
        $list = array();
        while ( $row = $st->fetch() ) {
            $Post = new Post( $row );
            $list[] = $Post;
        }
        $connection = null;
        return ( array ( "results" => $list ) );
    }


    /**
     * Inserts the current Post object into the database, and sets its ID property.
     */
    public function insert() {

        if ( !is_null( $this->id ) ) trigger_error ( "Post::insert(): Attempt to insert an Post object that already has its ID property set (to $this->id).", E_USER_ERROR );

        $connection = connect();

        $sql = "INSERT INTO post ( publicationDate, title, text, link, type, buttonText, photoLink ) VALUES ( FROM_UNIXTIME(:publicationDate), :title, :text, :link, :type, :buttonText, :photoLink )";
        $st = $connection->prepare ( $sql );
        $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
        $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
        $st->bindValue( ":text", $this->text, PDO::PARAM_STR );
        $st->bindValue( ":link", $this->link, PDO::PARAM_STR );
        $st->bindValue( ":type", $this->type, PDO::PARAM_STR );
        $st->bindValue( ":buttonText", $this->buttonText, PDO::PARAM_STR );
        $st->bindValue( ":photoLink", $this->photoLink, PDO::PARAM_STR );
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
    public function update() {

        if ( is_null( $this->id ) ) trigger_error ( "Post::update(): Attempt to update an Post object that does not have its ID property set.", E_USER_ERROR );

        // Update the Post
        $connection = connect();
        $sql = "UPDATE post SET publicationDate=FROM_UNIXTIME(:publicationDate), title=:title, text=:text, link=:link, type=:type, buttonText=:buttonText, photoLink=:photoLink  WHERE id = :id";
        $st = $connection->prepare ( $sql );
        $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
        $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
        $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
        $st->bindValue( ":text", $this->text, PDO::PARAM_STR );
        $st->bindValue( ":link", $this->link, PDO::PARAM_STR );
        $st->bindValue( ":type", $this->type, PDO::PARAM_STR );
        $st->bindValue( ":buttonText", $this->buttonText, PDO::PARAM_STR );
        $st->bindValue( ":photoLink", $this->photoLink, PDO::PARAM_STR );
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
        $connection = null;
    }


    /**
     * Deletes the current Post object from the database.
     */

    public function delete() {
        if ( is_null( $this->id ) ) trigger_error ( "Post::delete(): Attempt to delete an Post object that does not have its ID property set.", E_USER_ERROR );

        // Delete the Post
        $connection = connect();
        $st = $connection->prepare ( "DELETE FROM post WHERE id = :id LIMIT 1" );
        $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
        return 'success';
        $connection = null;
    }

}

?>
