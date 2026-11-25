<?php


$message = "";
$username = "";

if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {
    $usernameInput = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if ( ! is_string( $usernameInput ) || ! is_string( $password ) ) {
        $message = "Virheelliset käyttäjätiedot.";
    } elseif ( trim( $usernameInput ) === "" || $password === "" ) {
        $message = "Anna käyttäjänimi ja salasana.";
    } else {
        $username = trim( $usernameInput );

        try {
            add_user( $username, $password, $db );
            $message = "Käyttäjä lisättiin.";
            $username = "";
        } catch ( PDOException $exception ) {
            if ( $exception->getCode() !== "23000" ) {
                throw $exception;
            }

            $message = "Käyttäjänimi on jo käytössä.";
        }
    }
}
?>