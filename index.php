<?php
/**
 * Created by PhpStorm.
 * User: okryshch
 * Date: 12/11/15
 * Time: 10:28 AM
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
              integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
              crossorigin="anonymous">
        <link rel="stylesheet" href="http://172.16.234.132/css/tradesyhometest.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.3/react.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.3/react-dom.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
                integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
                crossorigin="anonymous"></script>
        <script type="text/babel" src="http://172.16.234.132/js/TRADESYHOMETEST.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-static-top navbar-inverse">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">TRADESY HOME TEST</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">My Items</a></li>
                        <li><a href="#">Sign In</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            <div class="jumbotron">
                <h2>TURN YOUR CLOSET INTO CASH</h2>
                <p>Selling is safe and simple</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
            </div>
            <div id="content"></div>
            <div id="grid-view-pagination"></div>
        </div>
    </body>
</html>