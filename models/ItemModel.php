<?php

/**
 * Created by PhpStorm.
 * User: okryshch
 * Date: 12/20/15
 * Time: 12:13 PM
 */

include_once(__DIR__ . '/BaseModel.php');

class ItemModel extends BaseModel {
    public function __construct() {
        parent::__construct();
    }

    public function getItem($id) {
        return $this->db->items[$id];
    }
}