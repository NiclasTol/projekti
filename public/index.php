<?php
require_once (__DIR__ . "/../functions.php");
session_start ();

if ( empty(  $_SESSION ["user_id"] ) ){
    require ( "../login.php");
    exit;
}
if( isset( $_GET["logout"] ) ) {
    unset( $_SESSION["user_id"] );

    header( "Location: /" );
    exit;
}

$page = $_GET["page"] ?? "home";
?>

<h2>Tilausjärjestelmä!</h2>

<p>
    <a href="/">Etusivu</a>
    <a href="/index.php?page=users">Käyttäjät</a>
    <a href="/index.php?logout=true">kirjaudu ulos</a>
</p>

<?php
if ($page === "home") {
  }  elseif(  $page === "users") {
        require("../pages/users.php");
  } elseif( $page === "add_user") {
        require("../pages/add_user.php");
  } else {
    echo "Sivua ei löydy!";

}