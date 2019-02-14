<?
global $hostname;
global $username;
global $password;
global $databaseName;
global $connect;

$hostname     = "localhost";
$username     = "root";
$password     = "";
$databaseName = "test";
$connect = mysqli_connect( $hostname, $username, $password );

function create_table_news( $connect, $databaseName ) {
	$create_table_news = "CREATE TABLE IF NOT EXISTS " . $databaseName . ".news (
	    id INT NOT NULL AUTO_INCREMENT, 
	    title VARCHAR(255) NOT NULL,
	    description TEXT NOT NULL,
	    category VARCHAR(255) NOT NULL REFERENCES category(title),
	    created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
	    PRIMARY KEY (id))";

	if ( ! mysqli_query( $connect, $create_table_news ) ) {
		echo "table news create error";
	}
}

function create_table_categories( $connect, $databaseName ) {
	$create_table_cat = "CREATE TABLE IF NOT EXISTS " . $databaseName . ".category (
	    id INT NOT NULL AUTO_INCREMENT, 
	    title VARCHAR(255) NOT NULL UNIQUE,
	    created_at DATETIME DEFAULT CURRENT_TIMESTAMP, 
	    PRIMARY KEY (id))";

	if ( ! mysqli_query( $connect, $create_table_cat ) ) {
		echo "table category create error";
	}
}

function insert_categories( $connect, $databaseName ) {
	$query_insert = " INSERT INTO " . $databaseName . ".category (title) VALUES ('sport');
					  INSERT INTO " . $databaseName . ".category (title) VALUES ('science');
					  INSERT INTO " . $databaseName . ".category (title) VALUES ('work');
					  INSERT INTO " . $databaseName . ".category (title) VALUES ('music');
            		  INSERT INTO " . $databaseName . ".category (title) VALUES ('technology')";
	mysqli_multi_query( $connect, $query_insert );
}

function get_posts( $connect, $databaseName ) {

	$sql    = "SELECT * FROM  " . $databaseName . ".news";
	$result = mysqli_query( $connect, $sql );
	$posts  = mysqli_fetch_all( $result );

	return $posts;
}

function get_post_by_id( $post_id, $databaseName, $connect) {

	$sql    = "SELECT * FROM  " . $databaseName . ".news WHERE id = " . $post_id;
	$result = mysqli_query( $connect, $sql );
	$post   = mysqli_fetch_assoc( $result );

	return $post;
}