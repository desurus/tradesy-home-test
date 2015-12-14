<?php
/**
 * Created by PhpStorm.
 * User: okryshch
 * Date: 12/13/15
 * Time: 3:15 PM
 */

require_once(__ROOT__. '/templates/header.php');

?>

<div class="container">
    <div class="jumbotron">
        <h2>TURN YOUR CLOSET INTO CASH</h2>
        <p>Selling is safe and simple</p>
        <p><a class="btn btn-primary btn-lg" href="<?php $this->getBaseUrl(); ?>/about" role="button">Learn more</a></p>
    </div>
    <div id="content"></div>
    <div id="grid-view-pagination"></div>
</div>

<?php
require_once(__ROOT__ . '/templates/footer.php');
?>
