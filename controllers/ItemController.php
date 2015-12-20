<?php

/**
 * Created by PhpStorm.
 * User: okryshch
 * Date: 12/20/15
 * Time: 11:52 AM
 */

include_once(__DIR__ . '/BaseController.php');
include_once(ROOT_DIR . '/models/ItemModel.php');


class ItemController extends BaseController {

    public $single_item = null;

    public function __construct($matches) {
        parent::__construct($matches);
    }

    public function getItemId() {
        if ($this->getUrlFragment("item_id")) {
            return $this->getUrlFragment("item_id");
        } else {
            header('Location: /404');
        }
    }

    public function render() {
        $model = new ItemModel();
        $this->single_item = $model->getItem($this->getItemId());

        $this->setTitle($this->single_item['title']);
        $this->setJSNamespace("item");
        require_once(ROOT_DIR . '/templates/item.php');
    }
}