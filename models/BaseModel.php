<?php

/**
 * Created by PhpStorm.
 * User: okryshch
 * Date: 12/13/15
 * Time: 6:29 PM
 */

include_once(__DIR__ . '/NotORM.php');

abstract class BaseModel {
    public $db;
    public function __construct() {
        $pdo = new PDO("mysql:dbname=tradesy", "tradesy", "qwerty");
        $this->db = new NotORM($pdo);
    }
}