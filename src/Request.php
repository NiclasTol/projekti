<?php
class Request {
    public static function post_string( string $param): string {
        $value = $_POST[$param] ?? "";

        if( ! is_string( $value ) ) {
            return "";
        }

        return $value;
    }
}