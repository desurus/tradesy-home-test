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
include_once(__DIR__ . '/controllers/AboutController.php');
include_once(__DIR__ . '/controllers/NotFoundController.php');

$urls = array(
    '/' => 'Home',
    '/index.(json)\?.+' => 'Home',
    '/index.(json)\?page=(?P<page>\d+)&.+' => 'Home',
    '/about' => 'About',
    '/about.(json)\?.+' => 'About',
    '/item/(?P<item_id>\d+)' => 'Item',
    '/404' => 'NotFound'
);

class Home {
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

class About {
    function GET($matches) {
        $about = new AboutController($matches);
        if (array_key_exists(1, $matches)) {
            if ($matches[1] == "json") {
                $about->renderJson();
            }
        } else {
            $about->render();
        }
    }
}

class Item {
    function GET($matches) {
        echo "Item number ".$matches[1];
    }
}

class NotFound {
    function GET() {
        $not_found = new NotFoundController();
        $not_found->render();
    }
}

try {
    glue::stick($urls);
} catch (Exception $e) {
    header('Location: /404');
}