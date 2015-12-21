<?php
/**
 * Created by PhpStorm.
 * User: okryshch
 * Date: 12/20/15
 * Time: 12:18 PM
 */

require_once(ROOT_DIR. '/templates/header.php');

?>

<div class="container" id="item_page">
    <div class="page-header">
        <h1><?php echo $this->single_item["title"]; ?></h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo $this->getBaseUrl()."/images/".$this->single_item['image']; ?>"
                 class="img-responsive img-thumbnail"
                 alt="<?php echo $this->single_item['title']; ?>">
        </div>
        <div class="col-md-8">
            <p class="lead"><?php echo $this->single_item['desc']; ?></p>
            <dl class="dl-horizontal">
                <dt>Color:</dt>
                <dd><?php echo $this->single_item['color']; ?></dd>
                <dt>Condition:</dt>
                <dd><?php echo $this->single_item['condition']; ?></dd>
                <dt>Price:</dt>
                <dd>$<?php echo $this->single_item['price']; ?></dd>
            </dl>
            <a class="btn btn-primary" href="#" role="button">Edit this item</a>
            <a class="btn btn-danger" href="#" id="delete_item" role="button">Delete this item</a>
        </div>
    </div>
</div>

<?php
require_once(ROOT_DIR . '/templates/footer.php');
?>