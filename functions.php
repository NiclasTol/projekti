<?php
$settings = require( "settings.php" );

$db = new PDO(
    dsn: "mysql:dbname=" . $settings ["dbname"],
    username: $settings ["username"], 
    password: $settings ["password"], 
);
function username_exists( string $username, PDO $db ): bool {
     $stmt = $db->prepare( "SELECT id  FROM users WHERE username = :username LIMIT 1" );

        $stmt ->execute( [
        ":username" => $username 
     ] );

        $user = $stmt ->fetch ( PDO::FETCH_ASSOC);
         if( ! $user ) {
        return false;
    } else {
        return true;
    }
}

function add_user ( string $username, string $password, PDO $db ): int {
    $stmt = $db->prepare( "
INSERT INTO users (
    username, 
    password
    ) VALUES (
     :username, 
     :password
    
     
     )
" );
$stmt->execute( [
    ":username" => $username ,
     ":password" => password_hash( $password, PASSWORD_DEFAULT ),
] );

    return $db->lastInsertId();
}

function get_users( PDO $db ): array {
    $stmt = $db->query( "SELECT id, username FROM users ORDER BY username" );

    return $stmt->fetchAll( PDO::FETCH_ASSOC );
}

function authenticate_user( string $username, string $password, PDO $db ): ?int {
     $stmt = $db->prepare( "SELECT id, password FROM users WHERE username = :username LIMIT 1" );

$stmt ->execute( [
    ":username" => $username 
] );

    $user = $stmt ->fetch ( PDO::FETCH_ASSOC);
    if( ! $user) {
        return null;
    }
   if( ! password_verify( $password, $user ["password"] ) ) {
    return null;
   }
   
   return $user ["id"];
}


