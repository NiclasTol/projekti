<?php
spl_autoload_register( function( string $class ) {
    $class_file = __DIR__ . "/src/". $class . ".php";
    require_once( $class_file );
} );