<?
require_once 'functions.php';
require_once 'header.php';

$title       = filter_input( INPUT_POST, "title" );
$description = filter_input( INPUT_POST, "description" );
$category    = filter_input( INPUT_POST, "category" );

$title       = mysqli_real_escape_string( $connect, $title );
$description = mysqli_real_escape_string( $connect, $description );
$category    = mysqli_real_escape_string( $connect, $category );

if ( ! empty( $title ) ) {
	if ( ! empty( $description ) ) {

		$conn = new mysqli( $hostname, $username, $password, $databaseName );
		if ( mysqli_connect_error() ) {
			die( 'Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error() );
		} else {
			$sql = "INSERT INTO news (title, description, category) VALUES ('$title', '$description', '$category' )";
			if ( ! $conn->query( $sql ) ) {
				echo "Error: " . $sql . " " . $conn->error;
			}
			$conn->close();
			?>
            <div class="container" style="padding-top: 30px; ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron" style="text-align: center">
                            <h1 class="display">Thank You!</h1>
                            <p class="lead">Your post is was <strong>successfully</strong> added .</p>
                        </div>
                    </div>
                </div>
            </div>

			<?
		}
	}
}

?>


<?php
include_once 'footer.php';
?>