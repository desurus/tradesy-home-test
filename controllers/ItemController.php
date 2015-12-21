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
    public $model = null;

    public function __construct($matches) {
        parent::__construct($matches);
        $this->model = new ItemModel();
    }

    public function getItemId() {
        if ($this->getUrlFragment("item_id")) {
            return $this->getUrlFragment("item_id");
        } else {
            return null;
        }
    }

    public function isAddNewItem() {
        if ($this->getUrlFragment("add_item")) {
            return true;
        } else {
            return false;
        }
    }

    public function render() {
        $this->single_item = $this->model->getItem($this->getItemId());
        if ($this->single_item !== null) {
            $this->setTitle($this->single_item['title']);
            $this->setJSNamespace("item");
            require_once(ROOT_DIR . '/templates/item.php');
        } elseif ($this->isAddNewItem()) {
            $this->setTitle("Adding new item");
            $this->setJSNamespace("item_add_edit");
            require_once(ROOT_DIR . '/templates/item_add_edit.php');
        } else {
            header('Location: /404');
        }
    }

    public function delete() {
        $this->single_item = $this->model->getItem($this->getItemId());
        if ($this->single_item != null) {
            if ($this->single_item->delete()) {
                $this->returnJsonResponse(array("result" => "success"));
            } else {
                http_response_code(400);
                $this->returnJsonResponse(array("result" => "failure", "desc" => "error deleting the item"));
            }
        } else {
            http_response_code(404);
            $this->returnJsonResponse(array("result" => "failure", "descr" => "item not found"));
        }
    }
}