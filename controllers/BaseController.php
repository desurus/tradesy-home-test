<?php
/**
 * Created by PhpStorm.
 * User: okryshch
 * Date: 12/13/15
 * Time: 3:40 PM
 */

abstract class BaseController {
    private $title = "";
    private $javascript = "";
    private $matches = null;

    public function __construct($matches=array()) {
        $this->matches = $matches;
    }

    public function setJSNamespace($javascript) {
        $this->javascript = $javascript . "_namespace.js";
    }

    public function getJSNamespace() {
        return $this->javascript;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getUrlFragment($key) {
        if (array_key_exists($key, $this->matches)) {
            return $this->matches[$key];
        } else {
            return false;
        }
    }

    public function getBaseUrl() {
        $baseUrl = (isset($_SERVER['HTTPS'])
            && $_SERVER['HTTPS']
            && !in_array(strtolower($_SERVER['HTTPS']),array('off','no')))
            ? 'https'
            : 'http';
        $baseUrl .= '://'.$_SERVER['HTTP_HOST'];

        return $baseUrl;
    }

    abstract function render();

    public function returnJsonResponse($array) {
        header('Content-type:application/json');
        echo json_encode($array);
    }
}