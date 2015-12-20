<?php

/**
 * Created by PhpStorm.
 * User: okryshch
 * Date: 12/19/15
 * Time: 9:50 AM
 */

include_once(__DIR__ . '/BaseController.php');
//include_once(ROOT_DIR . '/models/HomeModel.php');

class AboutController extends BaseController {

    public function render() {
        $this->setTitle("Tradesy - About Us page");
        $this->setJSNamespace("about");
        require_once(ROOT_DIR . '/templates/about.php');
    }

    public function renderJson() {

        $data = array();

        $this->returnJsonResponse($data);
    }
}