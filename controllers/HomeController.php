<?php
/**
 * Created by PhpStorm.
 * User: okryshch
 * Date: 12/13/15
 * Time: 4:11 PM
 */

include_once(__DIR__ . '/BaseController.php');
include_once(ROOT_DIR . '/models/HomeModel.php');

class HomeController extends BaseController {

    public $limit = 6;
    public $offset = 0;

    public function __construct($matches) {
        parent::__construct($matches);
    }

    public function render() {
        $this->setTitle("Welcome to the Tradesy Home Test website!");
        $this->setJSNamespace("home");
        require_once(ROOT_DIR . '/templates/home.php');
    }

    public function renderJson() {

        $this->offset = $this->limit*($this->getCurrentPageNumber() - 1);


        $model = new HomeModel();

        $data = array(
            'pagination' => array(
                'current_page' => $this->getCurrentPageNumber(),
                'next_page' => (($model->countAllItems() - $this->offset*$this->getCurrentPageNumber() > 0) ? true : false)
            ),
            'items' => $model->getAllItems($this->limit, $this->offset)
        );

        $this->returnJsonResponse($data);
    }

}