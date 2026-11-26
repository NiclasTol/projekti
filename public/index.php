<?php
require_once( __DIR__ . "/../autoload.php" );
require_once( __DIR__ . "/../functions.php" );

session_start();

if( empty(  $_SESSION ["user_id"] ) ){
    require ( "../login.php");
    exit;
}
if( isset( $_GET["logout"] ) ) {
    unset( $_SESSION["user_id"] );

    header( "Location: /" );
    exit;
}


?>

<h2>Tilausjärjestelmä!</h2>

<p>
    <a href="/">Etusivu</a>
    <a href="/index.php?page=users">Käyttäjät</a>
    <a href="/index.php?page=orders">Tilaukset</a>
    <a href="/index.php?logout=true">kirjaudu ulos</a>
</p>

<?php
$page = $_GET["page"] ?? "home";
$page = preg_replace( "/[^a-z0-9_]/", "", $page );
$page_file = __DIR__ . "/../pages/" . $page . ".php";


if( ! file_exists( $page_file ) ) {
    echo "sivua ei löydy!";
} else {
    require_once( $page_file );
}


