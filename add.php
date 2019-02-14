<?
require_once 'header.php';
require_once 'functions.php';

$connect = mysqli_connect( $hostname, $username, $password );

$query = "SELECT * FROM " . $databaseName . ".category";

$result  = mysqli_query( $connect, $query );
$options = "";
while ( $row = mysqli_fetch_array( $result ) ) {
	$options = $options . "<option>$row[1]</option>";
}

?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1 class="my-4">Please add new post</h1>

                <form action="save.php" method="post">
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" placeholder="Title" required>
                    </div>

                    <div class="form-group">
                        <label>Select a post category</label>
                        <select class="form-control" name="category">
							<?php echo $options; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" rows="15" name="description" placeholder="Description"
                                  required></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-info" value="Add Button">
                    </div>
                </form>

            </div>
        </div>
    </div>


<?php
include_once 'footer.php';
?>