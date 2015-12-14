<?php
/**
 * Created by PhpStorm.
 * User: okryshch
 * Date: 12/13/15
 * Time: 4:11 PM
 */

include_once(__DIR__ . '/BaseController.php');

class HomeController extends BaseController {

    public function render()
    {
        $this->setTitle("Welcome to the Tradesy Home Test website!");
        $this->setJSNamespace("home");
        require_once(__ROOT__ . '/templates/home.php');
    }

    public function renderJson() {
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
            'items' => array(
                array(
                    'id' => 1,
                    'title' => 'Thumbnail label',
                    'desc' => 'Discing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'price' => '$35.00',
                    'image' => 'http://172.16.234.132/images/balmain-x-h-and-m-jacquard-stripe-sweater-9246103-0-1.jpg',
                    'more_link' => '/item/1/'
                ),
                array(
                    'id' => 2,
                    'title' => 'Thumbnail label',
                    'desc' => 'Discing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'price' => '$35.00',
                    'image' => 'http://172.16.234.132/images/balmain-x-h-and-m-jacquard-stripe-sweater-9246103-0-1.jpg',
                    'more_link' => '/item/1/'
                ),
                array(
                    'id' => 3,
                    'title' => 'Thumbnail label',
                    'desc' => 'Discing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'price' => '$35.00',
                    'image' => 'http://172.16.234.132/images/balmain-x-h-and-m-jacquard-stripe-sweater-9246103-0-1.jpg',
                    'more_link' => '/item/1/'
                ),
                array(
                    'id' => 4,
                    'title' => 'Thumbnail label',
                    'desc' => 'Discing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'price' => '$35.00',
                    'image' => 'http://172.16.234.132/images/balmain-x-h-and-m-jacquard-stripe-sweater-9246103-0-1.jpg',
                    'more_link' => '/item/1/'
                ),
                array(
                    'id' => 5,
                    'title' => 'Thumbnail label',
                    'desc' => 'Discing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'price' => '$35.00',
                    'image' => 'http://172.16.234.132/images/balmain-x-h-and-m-jacquard-stripe-sweater-9246103-0-1.jpg',
                    'more_link' => '/item/1/'
                )
            )
        );

        $this->returnJsonResponse($data);
    }

}