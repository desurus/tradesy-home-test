<?php
/**
 * Created by PhpStorm.
 * User: okryshch
 * Date: 12/11/15
 * Time: 10:28 AM
 */

require_once(__DIR__ . '/glue.php');

$urls = array(
    '/' => 'index'
);
class index {
    function GET() {
        $title = "Welcome to the new site!";
        require_once(__DIR__ . '/templates/home.php');
    }
}
glue::stick($urls);