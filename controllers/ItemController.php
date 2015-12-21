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

    public function add() {
        var_dump($_FILES);
        if (isset($_FILES["file"]["type"])) {
            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES["file"]["name"]);
            $file_extension = end($temporary);
            if ((($_FILES["file"]["type"] == "image/png")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/jpeg")
                ) && ($_FILES["file"]["size"] < 100000)
                && in_array($file_extension, $validextensions)) {
                if ($_FILES["file"]["error"] > 0) {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
                } else {
                    if (file_exists(ROOT_DIR . "images/" . $_FILES["file"]["name"])) {
                        echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
                    } else {
                        $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                        $targetPath = ROOT_DIR . "images/" . $_FILES['file']['name']; // Target path where file is to be stored
                        move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
                    }
                }
            }
        }
        $this->returnJsonResponse(array("result" => "success"));
    }
}