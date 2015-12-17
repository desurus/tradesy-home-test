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

    public function render()
    {
        $this->setTitle("Welcome to the Tradesy Home Test website!");
        $this->setJSNamespace("home");
        require_once(ROOT_DIR . '/templates/home.php');
    }

    public function renderJson() {

        $model = new HomeModel();

        $data = array(
            'pagination' => array(
                'prev_page' => array(
                    'active' => false,
                    'page' => 0
                ),
                'next_page' => array(
                    'active' => true,
                    'page' => 2
                )
            ),
            'items' => $model->getAllItems()
        );

        $this->returnJsonResponse($data);
    }

}