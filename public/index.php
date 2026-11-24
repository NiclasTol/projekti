<?php
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
?>

Teretuloa!

<a href="/index.php?logout=true">kirjaudu ulos</a
