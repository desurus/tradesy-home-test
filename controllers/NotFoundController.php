<?php

/**
 * Created by PhpStorm.
 * User: okryshch
 * Date: 12/20/15
 * Time: 11:20 AM
 */
class NotFoundController extends BaseController {
    public function render() {
        http_response_code(404);
        $this->setTitle("404 Page not found!");
        $this->setJSNamespace("notfound");
        require_once(ROOT_DIR . '/templates/404.php');
    }
}