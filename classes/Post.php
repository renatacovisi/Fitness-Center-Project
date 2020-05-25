<?php
//require ("../app/src/connection.php");

/**
 * Class to handle Posts
 */
#define our Post class
class Post
{

    // Properties
# Each Post object that we create will store its Post data in these properties
# the Post object property names mirror the field names in our Posts database table
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
#constructor
#called automatically by the PHP engine whenever a new Post object is created
#$data array containing the data to put into the new object’s properties
    public function __construct( $data=array() ) {
        #populate properties
        #$this->propertyName means: “The property of this object that has the name “$propertyName“.
        #cast to integers (int)
        if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
        if ( isset( $data['publicationDate'] ) ) $this->publicationDate = (int) $data['publicationDate'];
        #regular expression only allows a certain range of characters
        #https://www.ntu.edu.sg/home/ehchua/programming/howto/Regexe.html
        if ( isset( $data['title'] ) ) $this->title = $data['title'];
        if ( isset( $data['text'] ) ) $this->text = $data['text'];
        if ( isset( $data['link'] ) ) $this->link = $data['link'];
        if ( isset( $data['type'] ) ) $this->type = $data['type'];
        if ( isset( $data['buttonText'] ) ) $this->buttonText = $data['buttonText'];
        if ( isset( $data['photoLink'] ) ) $this->photoLink = $data['photoLink'];
    }


    /**
     * Sets the object's properties using the edit form post values in the supplied array
     *
     * @param assoc The form post values
     */
#stores a supplied array of data in the object’s properties
#can handle data in the format that is submitted via our New Post and Edit Post forms
# make it easy for our admin scripts to store the data submitted by the forms
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

#methods that access the MySQL database
    /**
     * Returns an Post object matching the given Post ID
     *
     * @param int The Post ID
     * @return Post|false The Post object, or false if the record was not found or there was a problem
     */
#accepts an Post ID argument ($id),
#then retrieves the Post record with that ID from the Posts table,
#and stores it in a new Post object.
#static enables our method to be called without needing an object
    public static function getById( $id ) {
        #Use PDO to connect to the database
        #PHP Data Objects — is an object-oriented library built into PHP
        #that makes it easy for PHP scripts to talk to databases.
        #Connect to the database
        #using the login details from the config.php file,
        #and stores the resulting connection handle in $conn
        #retrieves all fields (*) from the record in the Posts table that matches the given id field
        #retrieves the publicationDate field in UNIX timestamp format
        #USES :id placeholder later we will bind a PDO method to this placeholder
        #stores our SELECT statement in a string
        $sql = "SELECT *, UNIX_TIMESTAMP(publicationDate) AS publicationDate FROM Posts WHERE id = :id";
        #create a prepare statement by calling $conn->prepare()
        #allow your database calls to be faster and more secure.
        $st = $connection->prepare( $sql );
        # bind the value of our $id variable —
        # the ID of the Post we want to retrieve — to our :id placeholder
        # pass in the placeholder name :id;
        # the value to bind to it $id;
        # the value’s data type (integer in this case) so that PDO knows how to correctly escape the value. PARAM_INT
        $st->bindValue( ":id", $id, PDO::PARAM_INT );
        #run the query
        $st->execute();
        #retrieve the resulting record as an associative array of field names and
        #corresponding field values, which we store in the $row variable
        $row = $st->fetch();
        #assign null to the $conn variable to close the connection
        $conn = null;
        #check if row contains data
        #if true - create a new Post object - stores the record returned from the database
        #return this object to the calling code
        #calls our Post constructor, which populates the object with the data contained in the $row array
        if ( $row ) return new Post( $row );
    }


    /**
     * Returns all (or a range of) Post objects in the DB
     *
     * @param int Optional The number of rows to return (default=all)
     * @return Array|false A two-element array : results => array, a list of Post objects; totalRows => Total number of Posts
     */
#$numRows = The maximum number of Posts to retrieve
    public static function getList( $numRows=1000000, $type="news" ) {
        $connection = connect();
        #see getById() above
        #SQL_CALC_FOUND_ROWS tells MySQL to return the actual number of records returned
        $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(publicationData) AS publicationData FROM Post
            WHERE type = :type ORDER BY publicationData DESC LIMIT :numRows";

        $st = $connection->prepare( $sql );
        $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
        $st->bindValue( ":type", $type, PDO::PARAM_STR );
        $st->execute();
##create an array $list holds corresponding Post objects
        $list = array();
#while loop to retrieve the next row via fetch(),
#create a new Post object,
#store the row values in the object,
#add the object to the $list array.
#When there are no more rows, fetch() returns false and the loop exits
        while ( $row = $st->fetch() ) {
            $Post = new Post( $row );
            $list[] = $Post;
        }
        $connection = null;
#return both the list of Post objects ($list) and the total row count as an associative array
        return ( array ( "results" => $list ) );
    }


    /**
     * Inserts the current Post object into the database, and sets its ID property.
     */
#adding Posts
#adds a new Post record to the Posts table, using the values stored in the current Post object
    public function insert() {

        // Does the Post object already have an ID?
        if ( !is_null( $this->id ) ) trigger_error ( "Post::insert(): Attempt to insert an Post object that already has its ID property set (to $this->id).", E_USER_ERROR );

        // Insert the Post
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
#FROM_UNIXTIME() function converts the publication date from UNIX timestamp format back into MySQL format
        $sql = "INSERT INTO Posts ( publicationDate, title, summary, content ) VALUES ( FROM_UNIXTIME(:publicationDate), :title, :summary, :content )";
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
#PDO::PARAM_STR binds string values to placeholders
        $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
        $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
        $st->bindValue( ":content", $this->content, PDO::PARAM_STR );
        $st->execute();
#retrieves the new Post record’s ID using the PDO lastInsertId()
        $this->id = $conn->lastInsertId();
        $conn = null;
    }


    /**
     * Updates the current Post object in the database.
     */
#similar to insert(), except that it
#updates an existing Post record in the database instead of creating a new record
    public function update() {

        // Does the Post object have an ID?
#can’t update a record without knowing its ID
#check that the object has an ID
        if ( is_null( $this->id ) ) trigger_error ( "Post::update(): Attempt to update an Post object that does not have its ID property set.", E_USER_ERROR );

        // Update the Post
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
#id = :id - pass the object’s ID to the UPDATE statement so that it knows which record to update
        $sql = "UPDATE Posts SET publicationDate=FROM_UNIXTIME(:publicationDate), title=:title, summary=:summary, content=:content WHERE id = :id";
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
        $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
        $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
        $st->bindValue( ":content", $this->content, PDO::PARAM_STR );
        $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
        $st->execute();
        $conn = null;
    }


    /**
     * Deletes the current Post object from the database.
     */

    public function delete() {

        // Does the Post object have an ID?
#use the object’s $id property to identify the record in the table
#LIMIT 1 - make sure that only 1 Post record can be deleted at a time
        if ( is_null( $this->id ) ) trigger_error ( "Post::delete(): Attempt to delete an Post object that does not have its ID property set.", E_USER_ERROR );

        // Delete the Post
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $st = $conn->prepare ( "DELETE FROM Posts WHERE id = :id LIMIT 1" );
        $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
        $st->execute();
        $conn = null;
    }

}

?>
