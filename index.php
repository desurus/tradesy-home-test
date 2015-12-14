<?php
/**
 * Created by PhpStorm.
 * User: okryshch
 * Date: 12/11/15
 * Time: 10:28 AM
 */

require_once(__DIR__ . '/glue.php');
include_once(__DIR__ . '/controllers/HomeController.php');
define('__ROOT__', dirname(__FILE__));

$urls = array(
    '/' => 'home',
    '/index.(json)\?.+' => 'home',
    '/index.(json)\?page=(?P<page>\d+)' => 'home',
    '/about' => 'about'
);

class home {
    function GET($matches) {
        $home = new HomeController($matches);
        if ($matches[1] && $matches[1] == "json") {
            $home->renderJson();
        } else {
            $home->render();
        }
    }
}

class about {
    function GET() {
        echo("<p>This is about page</p>");
    }
}

try {
    glue::stick($urls);
} catch (Exception $e) {
    echo($e->getMessage());
}