<?php
require_once 'header.php';
require_once 'functions.php';

if ( ! $connect ) {
	die( 'Connection error: ' . mysqli_error() );
}

$db = mysqli_select_db( $connect, $databaseName );

if ( empty( $db ) ) {
	$create_db = "CREATE DATABASE " . $databaseName;
	if ( ! mysqli_query( $connect, $create_db ) ) {
		echo "database create error";
	}
}

create_table_news( $connect, $databaseName );
create_table_categories( $connect, $databaseName );
insert_categories( $connect, $databaseName );

?>

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <h1 class="my-4">Blog
                    <small>all posts are displayed here</small>
                </h1>

				<? $posts = get_posts( $connect, $databaseName ); ?>
				<? foreach ( $posts as $post ): ?>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title"><a href="/post.php?post_id=<?= $post[0] ?>"><?= $post[1] ?></a></h2>
                            <p class="card-text"><?= mb_substr( $post[2], 0, 300 ) . '...' ?></p>
                            <a href="/post.php?post_id=<?= $post['0'] ?>" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            <ul class="list-inline">
                                <li>
                                    <i class="fas fa-align-justify"></i><a> <?= $post[3] ?></a>
                                </li>
                                <li>
                                    <i class="far fa-calendar"></i><a> <? echo date( 'F d, Y ', strtotime( $post[4] ) ); ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>

				<? endforeach; ?>

            </div>
        </div>
    </div>

<?php
include_once 'footer.php';
?>