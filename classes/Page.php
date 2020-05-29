<?php


class Page
{
    /**
     * @var int The Page ID from the database
     */
    public $id = null;

    /**
     * @var string Name of the Page
     */
    public $name = null;

    /**
     * @var string link to the Page
     */
    public $link = null;

    /**
     * @var string minLevel the user must have to have access to the page
     */
    public $minLevel = null;

    /**
     * Sets the object's properties using the values in the supplied array
     *
     * @param array $data The property values
     */
    public function __construct( $data=array() ) {
        #populate properties
        #cast to integers (int)
        if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
        if ( isset( $data['name'] ) ) $this->name = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['name']);
        if ( isset( $data['link'] ) ) $this->link = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['link']);
        if ( isset( $data['minLevel'] ) && in_array($data['minLevel'], ['public', 'member', 'admin'], true) ) $this->minLevel = (string) $data['minLevel'];
    }

    /**
     * Returns an Page object matching the given Page Name
     *
     * @param string name
     * @return Page|null The Page object, or false if the record was not found or there was a problem
     */

    public static function getByName( $name ) {
        $connection = connect();

        $sql = "SELECT * FROM page WHERE name = :name";
        $st = $connection->prepare( $sql );
        $st->bindValue( ":name", $name, PDO::PARAM_STR );
        $st->execute();
        $row = $st->fetch();
        $connection = null;
        if ( $row ) return new Page( $row );
    }


    /**
     * Returns an Page object matching the given Page Name
     *
     * @param string level
     * @return Array|null The Page object, or false if the record was not found or there was a problem
     */

    public static function getListByUserLevel( $level ) {
        $connection = connect();

        $levels = array();
        array_push($levels, 'public');
        if ($level == 'member' || $level == 'admin') array_push($levels, 'member');
        if ($level == 'admin') array_push($levels, 'admin');

        $in  = str_repeat('?,', count($levels) - 1) . '?';
        $sql = "SELECT * FROM page WHERE minLevel IN ($in)";
        $st = $connection->prepare( $sql );
        $st->execute($levels);
        if (!$st->execute()) {
            $connection = null;
            return 'failed';
        };
        $list = array();
        while ( $row = $st->fetch() ) {
            $page = new Page( $row );
            $list[] = $page;
        }
        $connection = null;
        return ( array ( "results" => $list ) );
    }



}