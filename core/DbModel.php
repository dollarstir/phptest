<?php

class DbModel
{
    public $conn;

    public $dbhost = dbhost;
    public $dbuser = dbuser;
    public $dbpass = dbpass;
    public $dbname = dbname;

    // public function __construct()
    // {
    //     try {
    //         $this->conn = new PDO('mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname . '', '' . $this->dbuser . '', '' . $this->dbpass . '');
    //         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         echo '<h1 style="color:red;">ERROR: Failed to connect  Database</h1>';
    //     }
    // }


    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:host=' . dbhost . ';dbname=' . dbname . '', '' . dbuser . '', '' . dbpass . '');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo '<h1 style="color:red;">ERROR: Failed to connect  Database</h1>';
        }
    }


}

/**
 *SELECT gt.gt_id AS lottery_id, gt.name AS name, IF(ul.state IS NULL, gt.state, ul.state) AS state FROM game_type gt LEFT
 * JOIN user_lottery ul ON gt.gt_id = ul.lottery_id AND ul.uid = 4
 */