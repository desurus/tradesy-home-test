<?php

/**
 * Created by PhpStorm.
 * User: okryshch
 * Date: 12/13/15
 * Time: 6:39 PM
 */

include_once(__DIR__ . '/BaseModel.php');

class HomeModel extends BaseModel {
    public function __construct() {
        parent::__construct();
    }

    public function getAllItems($limit, $offset) {
        $result = array();
        foreach ($this->db->items()->limit($limit, $offset) as $item) {
            $result[] = array(
                'id' => $item["id"],
                'title' => $item["title"],
                'desc' => $item["desc"],
                'price' => $item["price"],
                'image' => "/images/".$item["image"],
                'more_link' => "/item/".$item["id"]
            );
        }
        return $result;
    }

    public function countAllItems() {
        return $this->db->items()->count("*");
    }
}