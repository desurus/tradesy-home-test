<?php
/**
 * Created by PhpStorm.
 * User: okryshch
 * Date: 12/11/15
 * Time: 10:28 AM
 */

define('ROOT_DIR', dirname(__FILE__));
require_once(__DIR__ . '/glue.php');
include_once(__DIR__ . '/controllers/HomeController.php');

$urls = array(
    '/' => 'home',
    '/index.(json)\?.+' => 'home',
    '/index.(json)\?page=(?P<page>\d+)' => 'home',
    '/about' => 'about'
);

class home {
    function GET($matches)
    {
        $home = new HomeController($matches);
        if (array_key_exists(1, $matches)) {
            if ($matches[1] == "json") {
                $home->renderJson();
            }
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