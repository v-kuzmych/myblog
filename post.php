<?php
require_once 'header.php';
require_once 'functions.php';

$post_id = $_GET['post_id'];

if ( ! is_numeric( $post_id ) ) {
	exit();
}

$post = get_post_by_id( $post_id, $databaseName, $connect );

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-4"><?= $post['title'] ?></h1>
            <span class="lead"><i class="fas fa-align-justify"></i> <?= $post['category'] ?></span>
            <p>Posted on <? echo date( 'F d, Y ', strtotime( $post['created_at'] ) ); ?></p>
            <p class="lead" style="border-top: solid gainsboro 1px; padding-top: 15px"><?= $post['description'] ?></p>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
